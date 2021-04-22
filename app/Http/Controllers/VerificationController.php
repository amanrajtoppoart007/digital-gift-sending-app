<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VerificationMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify($token)
    {
        $message = "";
        $whereColumn = "email";
        $whereValue = "";
        $query = VerificationMessage::query();
        $query->where('token', $token);
        $query->where('is_expired', false);
        if (request()->email) {
            $query->where('email', request()->email);
            $message = "Your email has verified";
            $whereColumn = "email";
            $whereValue = request()->email;
        } else if (request()->mobile) {
            $query->where('mobile', request()->mobile);
            $message = "Your mobile has verified";
            $whereColumn = "mobile";
            $whereValue = request()->mobile;
        }

        $verification = $query->latest()->first();
        if (!$verification) {
            abort(404);
        }

        $user = User::where('id', $verification->user_id)->orWhere($whereColumn, $whereValue)->first();
        if ($user) {
            if (request()->email) {
                $user->email_verified_at = Carbon::now()->format(config('panel.date_format') . ' ' . config('panel.time_format'));
                if ($user->mobile_verified_at) {
                    $user->verified = 1;
                    $user->verified_at = Carbon::now()->format(config('panel.date_format') . ' ' . config('panel.time_format'));
                }
            } elseif (request()->mobile) {
                $user->mobile_verified_at = Carbon::now()->format(config('panel.date_format') . ' ' . config('panel.time_format'));
                if ($user->email_verified_at) {
                    $user->verified = 1;
                    $user->verified_at = Carbon::now()->format(config('panel.date_format') . ' ' . config('panel.time_format'));
                }
            }

            $user->save();
            $verification->is_expired = 1;
            $verification->save();
        } else {
            abort(404);
        }
        return view('guest.auth.verificationMessage', compact('message', 'user'));
    }
}

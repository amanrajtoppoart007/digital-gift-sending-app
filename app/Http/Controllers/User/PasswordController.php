<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('user.profile.changePassword');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return response()->json([
                "status" => 0,
                "response" => "error",
                "message" => 'You have entered wrong password'
            ]);
        }
        try {
            auth()->user()->update(['password' => Hash::make($request->password)]);
            $url = route('home');
            $result = ["status" => 1, "response" => "success", "url" => $url, "message" => "Password changed successfully"];
        } catch (\Exception $exception) {
            $result = ["status" => 0, "response" => "error", "message" => $exception->getMessage()];
        }
        return response()->json($result, 200);
    }
}

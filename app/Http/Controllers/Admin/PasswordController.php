<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PasswordController extends Controller
{
    public function showChangePasswordForm()
    {
        return view('admin.changePassword');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required|same:password'
        ]);

        if (!Hash::check($request->current_password, auth()->user()->password)) {
            return back()->withErrors(['error' => 'You have entered wrong password'])->withInput();
        }
        auth()->user()->update(['password' => Hash::make($request->password)]);
        return back()->with('message', 'Password changed successfully!');
    }
}

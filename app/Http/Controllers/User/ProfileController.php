<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        $states = State::all();
        $user = auth()->user();

        return view("user.profile.edit", compact('user', 'states'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'state_id' => 'required|exists:states,id',
            'city' => 'required',
            'pin_code' => 'required|digits:6',
            'address' => 'required'
        ]);

        try {
            $user = auth()->user();
            $user->name = $request->name;
            $user->state_id = $request->state_id;
            $user->city = $request->city;
            $user->pin_code = $request->pin_code;
            $user->address = $request->address;
            if ($user->save()) {
                $result = ["status" => 1, "response" => "success", "message" => "Profile updated successful"];

            } else {
                $result = ["status" => 0, "response" => "error", "message" => "Something went wrong"];

            }
        } catch (\Exception $exception) {
            $result = ["status" => 0, "response" => "error", "message" => $exception->getMessage()];
        }
        return response()->json($result, 200);
    }
}

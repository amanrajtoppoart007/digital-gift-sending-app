<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserProfileRequest;
use App\Http\Requests\UpdateUserProfileRequest;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct()
    {
          $this->middleware('auth');
    }

    public function index()
    {
        //
    }


    public function create()
    {
        return view('user.bankProfile.create');
    }


    public function store(StoreUserProfileRequest $request)
    {
        try {
            $request->request->add(['user_id'=>auth()->user()->id]);
            UserProfile::create($request->all());
            $url = route('home');
            $result = ["status" => 1, "response" => "success", "url" => $url, "message" => "User bank detail added successful"];
        }
        catch (\Exception $exception)
        {
           $result = ["status" => 0, "response" => "error", "message" => $exception->getMessage()];
        }
        return response()->json($result,200);
    }




    public function edit($id)
    {
        $account = UserProfile::where(['user_id'=>auth()->user()->id])->first();
        return view('user.bankProfile.edit',compact('account'));
    }


    public function update(UpdateUserProfileRequest $request, $id)
    {
        try {
            UserProfile::where(['user_id'=>auth()->user()->id])->update($request->validated());
            $url = route('home');
            $result = ["status" => 1, "response" => "success", "url" => $url, "message" => "User bank detail added successful"];
        }
        catch (\Exception $exception)
        {
           $result = ["status" => 0, "response" => "error", "message" => $exception->getMessage()];
        }
        return response()->json($result,200);
    }


    public function destroy($id)
    {
        //
    }
}

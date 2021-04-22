<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserProfileRequest;
use App\Http\Requests\Admin\UpdateUserProfileRequest;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function __construct()
    {
          $this->middleware('auth:admin');
    }

    public function index()
    {
        //
    }


    public function create()
    {
        return view('admin.userProfiles.create');
    }


    public function store(StoreUserProfileRequest $request)
    {
        try {
            $userProfile = UserProfile::create($request->validated());
            $url = route('admin.userProfile.show',$userProfile->id);
            $result = ["status" => 1, "response" => "success", "url" => $url, "message" => "User bank detail added successful"];
        }
        catch (\Exception $exception)
        {
           $result = ["status" => 0, "response" => "error", "message" => $exception->getMessage()];
        }
        return response()->json($result,200);
    }


    public function show($id)
    {
         return view('admin.userProfiles.show');
    }


    public function edit($id)
    {
        $profile = UserProfile::find($id);
        return view('user.userProfiles.edit',compact('profile'));
    }


    public function update(UpdateUserProfileRequest $request, $id)
    {
        try {
            UserProfile::where(['user_id'=>$request->input('user_id')])->update($request->validated());
            $url = route('admin.userProfile.show',$id);
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
        $userProfile = UserProfile::find($id);
        $userProfile->delete();
        return redirect()->back();
    }
}

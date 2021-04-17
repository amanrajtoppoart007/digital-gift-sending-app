<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Otp;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
    public function access_step_one(Request $request)
    {
        $validator = Validator::make($request->json()->all(), [
            'mobile' => 'required|numeric|digits:10',
        ]);

        if ($validator->fails()) {
            return response()->json(['response' => 'validation_error', 'action' => 'retry', 'message' => $validator->errors()->all()], 200);
        }


        if (User::where('mobile', $request->input('mobile'))->doesntExist())
        {
            $res = Otp::where('mobile', $request->input('mobile'))->update(['is_expired' => '1']);
            $otp = rand(1000, 9999);
            $otp_status = 'success';//$this->sendotp($request->input('mobile');,$otp);
            $otpObj = new Otp();
            $otpObj->mobile = $request->input('mobile');
            $otpObj->otp = '1234';//$otp;
            $otpObj->sms_status = 'success';//$otp_status['status'];
            $otpObj->gateway_response = json_encode($otp_status);
            $otpObj->save();

            return response()->json(['response'=>'success','action'=>'login','message'=>'Please check your mobile for OTP'],200);

        }
        else
            {
            $res = Otp::where('mobile', $request->input('mobile'))->update(['is_expired' => '1']);
            $otp = rand(1000, 9999);
            $otp_status = 'success';//$this->sendotp($request->input('mobile');,$otp);
            $otpObj = new Otp();
            $otpObj->mobile = $request->input('mobile');
            $otpObj->otp = '1234';//$otp;
            $otpObj->sms_status = 'success';//$otp_status['status'];
            $otpObj->gateway_response = json_encode($otp_status);
            $otpObj->save();


            return response()->json(['response'=>'success','action'=>'login','message'=>'Please check your mobile for OTP'],200);

        }
    }

    public function access_step_two(Request $request)
    {
        $validator = Validator::make($request->json()->all(), [
            'mobile' => 'required',
            'otp' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendResponse('failed', $validator->errors(),'Validation Error.');
        }

        $otpdata = Otp::where('mobile', $request->input('mobile'))->where('is_expired', '0')->first();

        if (!empty($otpdata)) {
            if ($otpdata->otp == $request->input('otp'))
            {
                $v_token = rand(100000, 999999);
                $obj = Otp::findOrFail($otpdata->id);
                $obj->v_token = $v_token;
                $obj->is_expired = '1';
                $obj->save();

                if (User::where('mobile', $request->input('mobile'))->exists())
                {
                    $password = Hash::make($request->input('otp'));
                    User::where('mobile', $request->input('mobile'))->update(['password' => $password]);

                    $user = User::where('mobile', $request->input('mobile'))->first();

                    $access_token = $user->createToken('user_token')->plainTextToken;

                    $user['access_token'] = $access_token;

                   return response()->json(['response'=>'success','action'=>'logged_in','data'=>$user,'message'=>'User logged in successfully'],200);
                }
                else {
                    $data['verification_token'] = $v_token;
                    return response()->json(['response'=>'success','action'=>'register','data'=>$data,'message'=>'Otp verification successful ,please create your account'],200);
                }
            } else {
               return response()->json(['response'=>'error','action'=>'retry','message'=>'Otp verification failed'],200);
            }
        } else
            {
            return response()->json(['response'=>'error','action'=>'retry','message'=>'Something went wrong ,please try after some time'],200);
        }

    }

    public function access_step_third(Request $request)
    {
        $validator = Validator::make($request->json()->all(), [
            'mobile' => 'required|unique:users,mobile',
            'email' => 'unique:users,email',
            'name' => 'required',
            'verification_token' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendResponse('status',$validator->errors(),'Validation Error.');
        }
        $input = $request->json()->all();
        $otp = Otp::where('mobile', $input['mobile'])->where('v_token', $input['verification_token'])->first();

        if ($input['verification_token'] == $otp->v_token) {

            $input['password'] = Hash::make($otp->otp);
            $user = new User();
            $user->name = $input['name'];
            $user->email = $input['email'];
            $user->mobile = $input['mobile'];
            $user->password = $input['password'];
            if ($user->save()) {
                $success['result'] = 'verified';
                $success['access_token'] = $user->createToken('user_token')->plainTextToken;

                $success['user'] = User::where('id', $user->id)->select('id', 'name', 'email', 'mobile')->first();

                return $this->sendResponse('success', $success, 'User register successfully.');
            } else {
                $errormsg[] = 'Unable to register';
                return $this->sendResponse('failed', $errormsg, 'Something went wrong!!.');
            }
        } else {
            $errormsg[] = 'Unable to register';
            return $this->sendResponse('failed', $errormsg, 'Please try again!!.');
        }
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\FranchiseeRegistrationRequest;
use App\Http\Requests\HelpCenterRegistrationRequest;
use App\Http\Requests\UserRegistrationRequest;
use App\Library\TextLocal\TextLocal;
use App\Mail\EmailVerificationMessage;
use App\Mail\FranchiseeWelcomeMessage;
use App\Mail\HelpCenterWelcomeMessage;
use App\Mail\UserWelcomeMessage;
use App\Models\City;
use App\Models\District;
use App\Models\Franchisee;
use App\Models\FranchiseeProfile;
use App\Models\HelpCenter;
use App\Models\HelpCenterProfile;

use App\Http\Controllers\Controller;
use App\Http\Requests\FarmerRegistrationRequest;
use App\Models\Crop;
use App\Models\Membership;
use App\Models\Otp;
use App\Models\Pincode;
use App\Models\State;
use App\Models\User;
use App\Models\UserAddress;
use App\Models\UserProfile;
use App\Models\VerificationMessage;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class RegisterController extends Controller
{

    use MediaUploadingTrait;

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        $states = State::get();
        return view("guest.auth.register", compact("states"));
    }


    public function store(UserRegistrationRequest $request)
    {
        try {

            $mobileVerifiedAt = Carbon::now()->format(config('panel.date_format') . ' ' . config('panel.time_format'));
            $request->request->add(['mobile_verified_at' => $mobileVerifiedAt]);
            $user = User::create($request->all());
            if ($request->input('identity_proof', false)) {
                $user->addMedia(storage_path('tmp/uploads/' . $request->input('identity_proof')))->toMediaCollection('identity_proof');
            }

            if ($request->hasFile('identity_proof_other_person')) {
                if ($request->input('identity_proof_other_person', false)) {
                    $user->addMedia(storage_path('tmp/uploads/' . $request->input('identity_proof_other_person')))->toMediaCollection('identity_proof_other_person');
                }
            }
            //FOR EMAIL VERIFICATION
            $eToken = Str::random(64);
            $emailUrl = url("verify/" . $eToken . "?email=" . $user->email);
            $data = [
                'name' => $user->name,
                'url' => $emailUrl
            ];

            $vEmail = new VerificationMessage();
            $vEmail->email = $user->email;
            $vEmail->token = $eToken;
            $vEmail->user_id = $user->id;
            $vEmail->save();
            //Mail::to($user->email)->send(new EmailVerificationMessage($data));

            //FOR MOBILE VERIFICATION
            $mToken = Str::random(64);
            $vMobile = new VerificationMessage();
            $vMobile->mobile = $user->mobile;
            $vMobile->token = $mToken;
            $vMobile->user_id = $user->id;
            $vMobile->save();

            $mobileUrl = url("verify/" . $mToken . "?mobile=" . $user->mobile);

//            $sms = new TextLocal();
//            $sms->send("Click this link to verify ". $mobileUrl, $user->mobile,null);

           // Mail::to($user)->send(new UserWelcomeMessage());
            /*$sms = new TextLocal();
            $sms->send(trans('sms.registration',['reg_number'=>$user->mobile]),$user->mobile,null);
            $sms->send('this is test', $user->mobile, null);*/

            $url = route("registration.message",
                [
                    'entity_id' => Crypt::encryptString($user->id),
                    'token' => Crypt::encryptString(request()->input('password')),
                ]);

            $result = ["status" => 1, "response" => "success", "url" => $url, "message" => "User registration successful"];
        } catch (\Exception $exception) {
            $result = ["status" => 0, "response" => "error", "message" => $exception->getMessage()];
        }

        return response()->json($result);
    }


    public function message(User $user, $entity_id, $token)
    {
        $id = Crypt::decryptString($entity_id);
        $user = $user->find($id);
        $token = Crypt::decryptString($token);
        return view("guest.auth.message", compact('user', 'token'));

    }

    public function sendRegistrationOtp(UserRegistrationRequest $request)
    {

        Otp::where('mobile', $request->mobile)->update(['is_expired'=>'1']);
        $gatewayResponse = ['status' => 'success'];
        $otp = rand(1000,9999);
//        $sms = new TextLocal();
//        $gatewayResponse = $sms->send($otp . " is your otp", $request->mobile,null);

        $otpObj                     = new Otp();
        $otpObj->mobile             = $request->mobile;
        $otpObj->otp                = $otp;
        $otpObj->sms_status         = $gatewayResponse['status'];
        $otpObj->gateway_response   = json_encode($gatewayResponse);
        $otpObj->save();
        if($gatewayResponse['status'] == 'success'){
            $result = ["status" => 1, "response" => "success", "message" => "Otp send to your mobile please check"];
        }else{
            $result = ["status" => 0, "response" => "error", "message" => 'Failed sending otp'];
        }

        return response()->json($result);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required',
            'otp' => 'required'
        ]);

        $otpObj = Otp::whereOtp($request->otp)->whereMobile($request->mobile)->whereIsExpired(false)->first();

        if($otpObj){
            $otpObj->is_expired = true;
            if($otpObj->save()){
                $result = ["status" => 1, "response" => "success", "message" => "OTP Verified successfully."];

            }else{
                $result = ["status" => 0, "response" => "error", "message" => 'Something went wrong please try again'];
            }
        }else{
            $result = ["status" => 0, "response" => "error", "message" => 'Please enter a valid otp'];
        }

        return response()->json($result);
    }

}

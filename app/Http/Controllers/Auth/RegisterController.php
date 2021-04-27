<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Traits\MediaUploadingTrait;

use App\Http\Requests\UserRegistrationRequest;
use App\Library\TextLocal\TextLocal;
use App\Mail\EmailVerificationMessage;
use App\Mail\UserWelcomeMessage;
use App\Http\Controllers\Controller;
use App\Models\Otp;
use App\Models\State;
use App\Models\User;

use App\Models\VerificationMessage;
use Carbon\Carbon;

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
            Mail::to($user->email)->send(new EmailVerificationMessage($data));

            //FOR MOBILE VERIFICATION
            $mToken = Str::random(64);
            $vMobile = new VerificationMessage();
            $vMobile->mobile = $user->mobile;
            $vMobile->token = $mToken;
            $vMobile->user_id = $user->id;
            $vMobile->save();
            Mail::to($user)->send(new UserWelcomeMessage());


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

        try {
            Otp::where('mobile', $request->input('mobile'))->update(['is_expired'=>'1']);
        $gatewayResponse = ['status' => 'success'];
        $otp = rand(100000,999999);
        $sms = new TextLocal();

        $message = trans('sms.registration', ['serviceType' => 'registration','otp'=>$otp]);

        $sms->send($message, $request->input('mobile'), 'SFTFLS');
        $otpObj                     = new Otp();
        $otpObj->mobile             = $request->mobile;
        $otpObj->otp                = $otp;
        $otpObj->sms_status         = $gatewayResponse['status'];
        $otpObj->gateway_response   = json_encode($gatewayResponse);
        $otpObj->save();
        if($gatewayResponse['status'] == 'success')
        {
            $result = ["status" => 1, "response" => "success", "message" => "Otp send to your mobile please check"];
        }
        else
        {
            $result = ["status" => 0, "response" => "error", "message" => 'Failed sending otp'];
        }
        }
        catch (\Exception $exception)
        {
             $result = ["status" => 0, "response" => "error", "message" => $exception->getMessage()];
        }
        return response()->json($result);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'mobile' => 'required',
            'otp' => 'required'
        ]);

        try {
            $otpObj = Otp::whereOtp($request->otp)->whereMobile($request->mobile)->whereIsExpired(false)->first();

        if($otpObj)
        {
            $otpObj->is_expired = true;
            if($otpObj->save())
            {

                $user = User::where(['mobile'=>$request->input('mobile')])->first();
                $user->mobile_verified_at = now();
                if($user->email_verified_at)
                {
                    $user->verified = 1;
                }
                $user->save();

                $result = ["status" => 1, "response" => "success", "message" => "OTP Verified successfully."];

            }else{
                $result = ["status" => 0, "response" => "error", "message" => 'Something went wrong please try again'];
            }
        }else{
            $result = ["status" => 0, "response" => "error", "message" => 'Please enter a valid otp'];
        }
        }
        catch (\Exception $exception)
        {
            $result = ["status" => 0, "response" => "error", "message" => $exception->getMessage()];
        }

        return response()->json($result);
    }

    public function uploadDocumentForm()
    {
        $user = User::whereEmail(request()->email)->first();
        if(!$user) abort(404);
        $states = State::get();
        return view("guest.auth.uploadDocument", compact("states", 'user'));
    }

    public function uploadDocumentSubmit(Request $request)
    {
        $request->validate([
            "id" => "required|exists:users",
            'identity_proof' => 'required',
            'identity_proof_other_person' => 'nullable',
        ]);
        try {
            $user = User::find($request->id);
            if ($request->input('identity_proof', false)) {
                $user->addMedia(storage_path('tmp/uploads/' . $request->input('identity_proof')))->toMediaCollection('identity_proof');
            }

            if ($request->hasFile('identity_proof_other_person')) {
                if ($request->input('identity_proof_other_person', false)) {
                    $user->addMedia(storage_path('tmp/uploads/' . $request->input('identity_proof_other_person')))->toMediaCollection('identity_proof_other_person');
                }
            }

            VerificationMessage::whereUserId($request->id)->update(['is_expired' => true]);

            $url = route('index');

            $result = ["status" => 1, "response" => "success", "url" => $url, "message" => "Document uploaded successful"];
        } catch (\Exception $exception) {
            $result = ["status" => 0, "response" => "error", "message" => $exception->getMessage()];
        }

        return response()->json($result);
    }

}

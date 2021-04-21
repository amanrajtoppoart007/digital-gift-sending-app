<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuestStorePaymentRequest;
use App\Models\Payment;
use App\Models\State;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Softon\Indipay\Facades\Indipay;
class PaymentController extends Controller
{
    public function init($username)
    {
        $states = State::get();
        $template = Template::where(['username'=>$username])->first();
        return view("guest.payment.init",compact("template","states"));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'username'=>'required',
            'txn_number'=>'required',
            'amount'=>'required|numeric',
            'name'=>'required',
             'email'=>'required|email',
        ]);
        if(!$validator->fails())
        {
            try {
                $params = [
                    'key' => 'o3AmnBtC',
                    'txnid' => $request->input('txn_number'),
                    'phone' => $request->input('phone') ?? '1234567890',
                    'email' => $request->input('phone') ?? 'example@demo.com',
                    'service_provider' => 'payu_paisa',
                    'surl' => route('gift.message', ['txn_number' => $request->input('txn_number')]),
                    'furl' => route('gift.init', ['username' => $request->input('username'),'retry'=>1]),
                    'firstname' => $request->input('name'),
                    'productinfo' => 'Blessings for user',
                    'amount' => $request->input('amount'),
                ];
                $payment = Indipay::prepare($params);
                return Indipay::process($payment);
            }
            catch (\Exception $exception)
            {
               return redirect()->back();
            }
        }
        else
        {
            return redirect()->back();
        }
    }

    public function store(GuestStorePaymentRequest $request,Payment $payment)
    {

        try {
           $request->request->add(['txn_number' => $payment->getNextOrderNumber(),'payment_status'=>'init']);
           $payment->create($request->all());

           $url = route('gift.create',[
                'username'=>$request->input('username'),
                'txn_number'=>$request->input('txn_number'),
                'amount'=>$request->input('amount'),
                 'name'=>$request->input('name')??null,
                'email'=>$request->input('email')??'no-reply@example.com',
                'phone'=>$request->input('mobile')??'8839421623',
           ]);
           $result = ["status" => 1, "response" => "success", "url" => $url, "message" => "User registration successful"];
        }
        catch (\Exception $exception)
        {
           $result = ["status" => 0, "response" => "error", "message" => $exception->getMessage()];
        }
        return response()->json($result,200);
    }

    public function message($txn_number)
    {
        $payment = Payment::where(['txn_number'=>$txn_number])->firstOrFail();
        return view("guest.payment.message", compact('payment', ));
    }
}

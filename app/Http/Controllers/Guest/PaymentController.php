<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuestStorePaymentRequest;
use App\Models\Payment;
use App\Models\State;
use App\Models\Template;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Softon\Indipay\Facades\Indipay;
class PaymentController extends Controller
{

     public function store(GuestStorePaymentRequest $request,Payment $payment)
    {

        try {
           $request->request->add(['txn_number' => $payment->getNextOrderNumber(),'payment_status'=>'initiated']);
           $payment->create($request->all());

           $url = route('gift.create',[
                'username'=>$request->input('username'),
                'txn_number'=>$request->input('txn_number'),
                'amount'=>$request->input('amount'),
                 'name'=>$request->input('name')??null,
                'email'=>$request->input('email')??($payment->user->email??'user@example.com'),
                'phone'=>$request->input('mobile')??($payment->user->mobile??'1234567890'),
           ]);
           $result = ["status" => 1, "response" => "success", "url" => $url, "message" => "Payment detail added successfully"];
        }
        catch (\Exception $exception)
        {
           $result = ["status" => 0, "response" => "error", "message" => $exception->getMessage()];
        }
        return response()->json($result,200);
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
                    'email' => $request->input('email') ?? 'example@demo.com',
                    'service_provider' => 'payu_paisa',
                    'surl' => route('payumoney.gateway.response', ['txn_number' => $request->input('txn_number')]),
                    'furl' => route('template', ['username' => $request->input('username'),'retry'=>1]),
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



    public function payUMoneyResponse(Request $request,$txn_number)
    {
        try {
            $payment = Payment::where(['txn_number'=>$txn_number])->first();
            $payment->update(['payment_status'=>$request->input('status')]);
            $request->request->add(['payment_id'=>$payment->id]);

            $params = [
                'payment_id'=>$payment->id,
                'txnid'=>$request->input('txnid'),
                'firstname'=>$request->input('firstname'),
                'productinfo'=>$request->input('productinfo'),
                'status'=>$request->input('status'),
                'mode'=>$request->input('mode'),
                'amount'=>$request->input('amount'),
                'net_amount_debit'=>$request->input('net_amount_debit'),
                'email'=>$request->input('email'),
                'phone'=>$request->input('phone'),
                'data'=>json_encode($request->all()),
            ];
            Transaction::create($params);
        }
        catch (\Exception $exception)
        {
            return redirect()->route('template',['username'=>$payment->template->username, 'retry'=>1,'message'=>$exception->getMessage()]);
        }

         return redirect()->route('gift.message',$txn_number);
    }

    public function message($txn_number)
    {
        $payment = Payment::where(['txn_number'=>$txn_number])->firstOrFail();
        return view("guest.payment.message", compact('payment', ));
    }
}

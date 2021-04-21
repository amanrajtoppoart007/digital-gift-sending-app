<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuestStorePaymentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
           if(request()->input('payment_type')==='with_sender_detail')
           {
               return [
                   'amount'=>'required|numeric',
                   'name'=>'required',
                   'email'=>'required|email',
                   'mobile'=>'required|numeric|digits:10',
                   'address'=>'required',
                   'state_id'=>'required|numeric',
                   'city'=>'required',
                   'pin_code'=>'required|numeric|digits:6',

               ];
           }
           else
           {
              return [
                   'amount'=>'required|numeric',
               ];
           }
    }
}

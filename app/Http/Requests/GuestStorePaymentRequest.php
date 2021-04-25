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
                   'name'=>'nullable',
                   'email'=>'nullable|email',
                   'mobile'=>'nullable|numeric|digits:10',
                   'address'=>'nullable',
                   'state_id'=>'nullable|numeric',
                   'city'=>'nullable',
                   'pin_code'=>'nullable|numeric|digits:6',
                   'short_note'=>'nullable'
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

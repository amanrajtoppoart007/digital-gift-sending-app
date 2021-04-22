<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('admin')->user() ? (auth('admin')->user()->id ??false):false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id'=>'required|numeric',
            'name'=>'required',
             'bank_name'=>'required',
             'ifsc_code'=>'required',
            'account_number'=>'required'
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserVerificationStatusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
     public function authorize()
    {
        return auth('admin')->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'=>'required|numeric|exists:users,id',
            'status'=>'in:0,1'
        ];
    }
    public function messages()
    {
        return ['id.required'=>'Please enter valid user id'];
    }
}

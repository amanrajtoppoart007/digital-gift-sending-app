<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegistrationRequest extends FormRequest
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
        return [
            "name" => "required",
            "mobile" => "required|unique:users,mobile",
            "email" => "required|email|unique:users,email",
             "address" => "required",
            "state_id" => "required",
            "city" => "required",
            "pin_code" => "required|numeric|digits:6",
            "password" => "required|required_with:password_confirmation|confirmed|min:6|same:password_confirmation",
            "password_confirmation" => "required",
            'identity_proof' => 'nullable'
        ];
    }
}

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
            "mobile" => "required",
            "email" => "required|email",
             "address" => "required",
            "state_id" => "required",
            "city" => "required",
            "identity_proof" => "required",
            "pin_code" => "required",
            "password" => "required",
            "confirm_password" => "required",
        ];
    }
}

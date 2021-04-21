<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;


class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('user_create');
    }

    public function rules()
    {
        return [
            "name" => "required",
            "mobile" => "required|numeric|digits:10|unique:users,mobile",
            "email" => "required|email|unique:users,email",
             "address" => "required",
            "state_id" => "required",
            "city" => "required",
            "pin_code" => "required|numeric|digits:6",
            "password" => "required|required_with:password_confirmation|confirmed|min:6|same:password_confirmation",
            "password_confirmation" => "required",
            'identity_proof' => 'nullable',
            'identity_proof_other_person' => 'nullable'
        ];
    }
}

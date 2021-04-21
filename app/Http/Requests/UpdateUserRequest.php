<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
       // return Gate::allows('user_edit');
        return true;
    }

    public function rules()
    {
        return [
            "account_type" => "required",
            "name" => "required",
            "mobile" => "required",
            "email" => "required",
             "address" => "required",
            "state_id" => "required",
            "city" => "required",
            "pin_code" => "required|numeric|digits:6",
            "password" => "required|min:6",
            'identity_proof' => 'nullable',
            'identity_proof_other_person' => 'nullable'
        ];
    }
}

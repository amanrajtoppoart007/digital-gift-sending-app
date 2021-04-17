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
        return true;
        //return Gate::allows('user_create');
    }

    public function rules()
    {
        return [
            'name'               => [
                'string',
                'required',
            ],
            'mobile'             => [
                'string',
                'required',
            ],
            'email'              => [
                'required',
                'unique:users',
            ],
            'password'           => [
                'required',
            ],

            'mobile_verified_at' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'referral_code'      => [
                'string',
                'nullable',
            ],
            'crops.*'            => [
                'integer',
            ],
            'crops'              => [
                'required',
                'array',
            ],
        ];
    }
}

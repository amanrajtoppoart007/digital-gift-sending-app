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
                'unique:users,email,' . request()->route('user')->id,
            ],
            'crops.*'            => [
                'integer',
            ],
            'crops'              => [
                'required',
                'array',
            ],
            'mobile_verified_at' => [
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
                'nullable',
            ],
            'referral_code'      => [
                'string',
                'nullable',
            ],
        ];
    }
}

<?php

namespace App\Http\Requests;

use App\Models\UserProfile;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserProfileRequest extends FormRequest
{
    public function authorize()
    {
        return auth()->user() ? (auth()->user()->id ??false):false;
    }

    public function rules()
    {
        return [
            'name'=>'required',
             'bank_name'=>'required',
             'ifsc_code'=>'required',
            'account_number'=>'required'
        ];
    }
}

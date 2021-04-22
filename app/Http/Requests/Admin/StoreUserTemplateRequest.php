<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserTemplateRequest extends FormRequest
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
            'user_id'=>'required|numeric',
            'username'=>'required|unique:templates,username',
            'banner_image'=>'required',
            'banner_title'=>'required',
            'description'=>'required',
            'payment_type'=>'required',
        ];
    }
}

<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserTemplateRequest extends FormRequest
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
        $rules = [
            'banner_title'=>'required',
            'description'=>'required',
            'payment_type'=>'required',
        ];
        if(request()->input('payment_type')==='with_sender_detail')
        {
            $rules['inputs'] = 'required|array|min:1';
            $rules['inputs.*'] = 'required|in:name,email,mobile,address,company_name';
        }
        else
        {
            $rules['inputs'] = 'array|nullable';
        }

        return $rules;
    }

    /**
     * @return array
     */

     public function messages()
    {
        return ['inputs.required' =>'Input fields detail for the sender is required'];
    }
}

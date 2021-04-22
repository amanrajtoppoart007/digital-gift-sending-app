<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MassDestroyEnquiryRequest extends FormRequest
{
    public function authorize()
    {
        //abort_if(Gate::denies('enquiry_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:enquiries,id',
        ];
    }
}

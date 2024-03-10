<?php

namespace App\Http\Requests\Vendor;

use Illuminate\Foundation\Http\FormRequest;

class VerifyOtpRequest extends FormRequest
{    public function rules(): array
    {
        return [
            'otp' => [
                'required',
                'integer',
                'digits:4',
                'exists:vendors,otp'
            ]
        ];
    }

    public function messages(): array
    {
        return trans('messages.validation');
    }
}

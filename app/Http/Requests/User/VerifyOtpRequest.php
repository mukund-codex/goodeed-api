<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class VerifyOtpRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'otp' => [
                'required',
                'integer',
                'digits:4',
                'exists:users,otp'
            ]
        ];
    }

    public function messages(): array
    {
        return trans('messages.validation');
    }
}

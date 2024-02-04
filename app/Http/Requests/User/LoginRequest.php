<?php

namespace App\Http\Requests\User;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'mobile_number' => [
                'required',
                'integer',
                'digits:10'
            ]
        ];
    }

    public function messages(): array
    {
        return trans('messages.validation');
    }
}

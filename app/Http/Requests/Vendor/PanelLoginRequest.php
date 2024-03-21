<?php

namespace App\Http\Requests\Vendor;

use Illuminate\Foundation\Http\FormRequest;

class PanelLoginRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => [
                'required',
                'email',
                'exists:vendors,email'
            ],
            'password' => [
                'required',
                'string'
            ]
        ];
    }

    public function messages(): array
    {
        return trans('messages.validation');
    }
}

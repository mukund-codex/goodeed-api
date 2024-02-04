<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'nullable',
                'string',
                'max:255'
            ],
            'email' => [
                'nullable',
                'string',
                'email:rfc,dns',
                'max:255',
                'unique:users,email,' . $this->user()->id
            ],
            'age' => [
                'nullable',
                'integer',
            ],
            'city' => [
                'nullable',
                'string',
                'max:255'
            ],
        ];
    }

    public function messages(): array
    {
        return trans('messages.validation');
    }
}

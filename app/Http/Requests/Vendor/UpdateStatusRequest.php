<?php

namespace App\Http\Requests\Vendor;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStatusRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'status' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return trans('messages.validation');
    }
}

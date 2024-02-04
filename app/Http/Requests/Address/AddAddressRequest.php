<?php

namespace App\Http\Requests\Address;

use Illuminate\Foundation\Http\FormRequest;

class AddAddressRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'address_line_1' => 'required|max:255',
            'address_line_2' => 'nullable|max:255',
            'landmark' => 'nullable|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'pincode' => 'required|integer|digits:6',
            'type' => 'required|in:home,work,other',
            'other_type' => 'required_if:type,other|max:255',
            'is_default' => 'boolean'
        ];
    }

    public function messages(): array
    {
        return trans('messages.validation');
    }
}

<?php

namespace App\Http\Requests\Address;

use Illuminate\Foundation\Http\FormRequest;

class DeleteAddressRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'id' => $this->route('id'),
        ]);
    }
    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:address,id,user_id,' . auth()->id()
        ];
    }

    public function messages(): array
    {
        return trans('messages.validation.address.id');
    }
}

<?php

namespace App\Http\Requests\Restaurant;

use Illuminate\Foundation\Http\FormRequest;

class DeleteRestaurantRequest extends FormRequest
{protected function prepareForValidation(): void
{
    $this->merge([
        'id' => (int) $this->route('id'),
    ]);
}
    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:restaurants,id'
        ];
    }

    public function messages(): array
    {
        return trans('messages.validation.dishes');
    }
}

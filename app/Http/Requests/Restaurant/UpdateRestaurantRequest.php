<?php

namespace App\Http\Requests\Restaurant;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRestaurantRequest extends FormRequest
{
    protected function prepareForValidation(): void
    {
        $this->merge([
            'id' => (int) $this->route('id'),
        ]);
    }
    public function rules(): array
    {
        return [
            'id' => 'required|integer|exists:restaurants,id',
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
        ];
    }

    public function messages(): array
    {
        return trans('messages.validation.dishes');
    }
}

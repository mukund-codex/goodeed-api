<?php

namespace App\Http\Requests\Dishes;

use Illuminate\Foundation\Http\FormRequest;

class AddDishesRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'restaurant_id' => 'required|integer|exists:restaurants,id',
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'is_active' => 'required|boolean',
            'is_veg' => 'required|boolean',
        ];
    }

    public function messages(): array
    {
        return trans('messages.validation');
    }
}

<?php

namespace App\Http\Requests\Dishes;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDishesRequest extends FormRequest
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
            'id' => 'required|integer|exists:dishes,id',
            'restaurant_id' => 'required|integer|exists:restaurants,id',
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'is_active' => 'required|boolean',
            'is_veg' => 'required|boolean',
            'discount_percentage' => 'nullable|numeric',
            'category_id' => 'required|integer|exists:categories,id',
            'subcategory_id' => 'required|integer|exists:subcategories,id',
        ];
    }

    public function messages(): array
    {
        return trans('messages.validation');
    }
}

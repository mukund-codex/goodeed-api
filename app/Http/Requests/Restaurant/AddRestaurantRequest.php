<?php

namespace App\Http\Requests\Restaurant;

use Illuminate\Foundation\Http\FormRequest;

class AddRestaurantRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|numeric|digits:10',
            'email' => 'required|email',
            'is_active' => 'sometimes|boolean'
        ];
    }
}

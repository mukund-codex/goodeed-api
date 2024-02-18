<?php

namespace App\Http\Requests\Dishes;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ListDishesRequest extends FormRequest
{
    public function __construct(Request $request)
    {
        parent::__construct();
        $request->merge(['restaurant_id' => (int) $request->route('id')]);
    }

    public function rules(): array
    {
        return [
            'restaurant_id' => 'required|integer|exists:restaurants,id',
        ];
    }

    public function messages(): array
    {
        return trans('messages.validation');
    }
}

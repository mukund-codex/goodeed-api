<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class AddCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'image' => 'sometimes',
            'status' => 'required|boolean'
        ];
    }

    public function messages(): array
    {
        return trans('messages.validation');
    }
}

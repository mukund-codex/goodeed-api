<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class GetOrderRequest extends FormRequest
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
            'id' => 'required|integer|exists:orders,id',
        ];
    }
}

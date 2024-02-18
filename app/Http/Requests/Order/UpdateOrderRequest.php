<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderRequest extends FormRequest
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
            'status' => 'required|string|in:placed,cancelled,completed,accepted,preparing,dispatched,delivered',
            'payment_status' => 'required|string|in:pending,processing,completed,cancelled',
            'reason_for_cancellation' => 'nullable|string',
            'cancellation_by' => 'nullable|string',
            'rating' => 'nullable|numeric|min:1|max:5',
            'cancellation_status' => 'nullable|string',
            'review' => 'nullable|string',
            'accepted_at' => 'nullable|date',
            'preparing_at' => 'nullable|date',
            'dispatched_at' => 'nullable|date',
            'delivered_at' => 'nullable|date',
            'cancelled_at' => 'nullable|date',
        ];
    }
}

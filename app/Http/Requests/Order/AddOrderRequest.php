<?php

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

class AddOrderRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'restaurant_id' => 'required|integer|exists:restaurants,id',
            'dishes_id' => 'required|integer|exists:dishes,id',
            'address_id' => 'required|integer|exists:address,id',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'total_price' => 'required|numeric',
            'status' => 'required|string|in:placed,cancelled,completed,accepted,preparing,dispatched,delivered',
            'payment_status' => 'required|string|in:pending,completed,cancelled,processing',
            'payment_mode' => 'required|string|in:cod,upi,debit,credit',
            'payment_response' => 'nullable|string',
            'delivery_time' => 'required|string',
            'delivery_date' => 'required|date',
            'delivery_charge' => 'required|numeric',
            'tax' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'tip' => 'nullable|numeric',
            'total_amount' => 'required|numeric',
            'order_type' => 'required|string|in:delivery,pickup',
            'order_placed_at' => 'nullable|date',
            'accepted_at' => 'nullable|date',
            'preparing_at' => 'nullable|date',
            'dispatched_at' => 'nullable|date',
            'delivered_at' => 'nullable|date',
            'cancelled_at' => 'nullable|date',
            'reason_for_cancellation' => 'nullable|string',
            'cancellation_by' => 'nullable|string',
            'rating' => 'nullable|numeric|min:1|max:5',
            'cancellation_status' => 'nullable|string',
            'review' => 'nullable|string',
        ];
    }
}

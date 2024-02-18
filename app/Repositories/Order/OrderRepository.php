<?php

namespace App\Repositories\Order;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class OrderRepository implements OrderInterface
{
    private Order $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function list(int $id): array|Collection
    {
        return $this->order->where('user_id', $id)
            ->with('user', 'restaurant', 'dish', 'address')->get();
    }

    public function create(array $request): Order
    {
        //Generate Order Number
        $orderNumber = $this->generateOrderNumber();
        $request['user_id'] = Auth::id();
        $request['order_number'] = $orderNumber;
        return $this->order->create($request);
    }

    private function generateOrderNumber(): string
    {
        $orderNumber = rand(111111111111111, 999999999999999);
        if ($this->order->where('order_number', $orderNumber)->exists()) {
            return $this->generateOrderNumber();
        }
        return $orderNumber;
    }
}

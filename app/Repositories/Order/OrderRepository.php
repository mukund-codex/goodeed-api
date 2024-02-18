<?php

namespace App\Repositories\Order;

use App\Models\Order;
use Carbon\Carbon;
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
            ->with('user', 'restaurant', 'dishes', 'address')
            ->orderBy('id', 'desc')->get();
    }

    public function create(array $request): Order
    {
        //Generate Order Number
        $orderNumber = $this->generateOrderNumber();
        $request['user_id'] = Auth::id();
        $request['order_number'] = $orderNumber;
        $request['order_placed_at'] = Carbon::now();

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

    public function update(array $request): Order
    {
        $order = $this->order->find($request['id']);
        $request['accepted_at'] = $request['status'] === 'accepted' ? Carbon::now() : null;
        $request['preparing_at'] = $request['status'] === 'preparing' ? Carbon::now() : null;
        $request['dispatched_at'] = $request['status'] === 'dispatched' ? Carbon::now() : null;
        $request['delivered_at'] = $request['status'] === 'delivered' ? Carbon::now() : null;
        $request['cancelled_at'] = $request['status'] === 'cancelled' ? Carbon::now() : null;

        $order->update($request);
        return $order;
    }

    public function getOrder(int $id): Order
    {
        return $this->order->where('id', $id)
            ->with('user', 'restaurant', 'dishes', 'address')->first();
    }
}

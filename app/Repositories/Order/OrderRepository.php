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

    public function index(): array|Collection
    {
        return $this->order
            ->select('orders.*', 'restaurants.name as restaurant_name',
                'users.name as user_name',
                'address.address_line_1',
                'address.address_line_2',
                'address.landmark',
                'address.city',
                'address.state',
                'address.pincode',
                'dishes.name as dish_name',
                'vendors.name as vendor_name')
            ->join('restaurants', 'orders.restaurant_id', '=', 'restaurants.id')
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('address', 'orders.address_id', '=', 'address.id')
            ->join('dishes', 'orders.dishes_id', '=', 'dishes.id')
            ->join('vendors', 'restaurants.vendor_id', '=', 'vendors.id')
            ->where('vendors.id', Auth::guard('vendor')->user()->id)
            ->orderBy('id', 'desc')->get();
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

    public function accept(int $id): Order
    {
        $order = $this->order->find($id);
        $order->update(['status' => 'accepted', 'accepted_at' => Carbon::now(), 'preparing_at' => Carbon::now()]);
        return $order;
    }

    public function reject(int $id): Order
    {
        $order = $this->order->find($id);
        $order->update(['status' => 'rejected', 'rejected_at' => Carbon::now()]);
        return $order;
    }

    public function complete(int $id): Order
    {
        $order = $this->order->find($id);
        $order->update(['status' => 'delivery', 'dispatched_at' => Carbon::now()]);
        return $order;
    }
}

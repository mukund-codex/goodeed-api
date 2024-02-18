<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\AddOrderRequest;
use App\Http\Requests\Order\GetOrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Http\Traits\ApiResponseTrait;
use App\Repositories\Order\OrderRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends Controller
{
    use ApiResponseTrait;

    private OrderRepository $order;

    public function __construct(OrderRepository $order)
    {
        $this->order = $order;
    }

    public function list(): JsonResponse
    {
        $orders = $this->order->list(Auth::id());
        return $this->showSuccessResponse(
            $orders,
            __('messages.orders.list.success'),
            Response::HTTP_OK
        );
    }

    public function create(AddOrderRequest $request): JsonResponse
    {
        $order = $this->order->create($request->validated());
        return $this->showSuccessResponse(
            $order,
            __('messages.orders.create.success'),
            Response::HTTP_CREATED
        );
    }

    public function update(UpdateOrderRequest $request): JsonResponse
    {
        $order = $this->order->update($request->validated());
        return $this->showSuccessResponse(
            $order,
            __('messages.orders.update.success'),
            Response::HTTP_OK
        );
    }

    public function getOrder(GetOrderRequest $request): JsonResponse
    {
        $order = $this->order->getOrder($request->validated('id'));
        return $this->showSuccessResponse(
            $order,
            __('messages.orders.get.success'),
            Response::HTTP_OK
        );
    }
}

<?php

namespace App\Http\Controllers\vendors;

use App\Http\Controllers\Controller;
use App\Repositories\Order\OrderRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private OrderRepository $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory
    {
        $orders = $this->orderRepository->index();
        return view('vendors.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function accept(int $id): RedirectResponse
    {
        $this->orderRepository->accept($id);
        return redirect()->back();
    }

    public function reject(int $id): RedirectResponse
    {
        $this->orderRepository->reject($id);
        return redirect()->back();
    }

    public function complete(int $id): RedirectResponse
    {
        $this->orderRepository->complete($id);
        return redirect()->back();
    }
}

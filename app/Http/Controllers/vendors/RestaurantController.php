<?php

namespace App\Http\Controllers\vendors;

use App\Http\Controllers\Controller;
use App\Http\Requests\Restaurant\AddRestaurantRequest;
use App\Http\Requests\Restaurant\DeleteRestaurantRequest;
use App\Http\Requests\Restaurant\UpdateRestaurantRequest;
use App\Repositories\Restaurant\RestaurantRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RestaurantController extends Controller
{
    private RestaurantRepository $restaurantRepository;

    public function __construct(RestaurantRepository $restaurantRepository)
    {
        $this->restaurantRepository = $restaurantRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $vendorId = Auth::guard('vendor')->user()->id;
        $restaurants = $this->restaurantRepository->index($vendorId);
        return view('vendors.restaurants.index', compact('restaurants'));
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
    public function store(AddRestaurantRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['vendor_id'] = Auth::guard('vendor')->user()->id;
        $this->restaurantRepository->create($data);
        return redirect()->route('vendors.restaurants')->with('success', 'Restaurant added successfully');
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
    public function edit(string $id): View|Application|Factory
    {
        $restaurant = $this->restaurantRepository->find($id);
        return view('vendors.restaurants.edit', compact('restaurant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRestaurantRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $this->restaurantRepository->update($data);
        return redirect()->route('vendors.restaurants')->with('success', 'Restaurant updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(DeleteRestaurantRequest $request): RedirectResponse
    {
        if ($this->restaurantRepository->delete($request->id)) {
            return redirect()->route('vendors.restaurants')->with('success', 'Restaurant deleted successfully');
        }
    }
}

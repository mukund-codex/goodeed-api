<?php

namespace App\Http\Controllers\vendors;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dishes\AddDishesRequest;
use App\Http\Requests\Dishes\UpdateDishesRequest;
use App\Repositories\Dishes\DishesRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DishesController extends Controller
{
    private DishesRepository $dishesRepository;

    public function __construct(DishesRepository $dishesRepository)
    {
        $this->dishesRepository = $dishesRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View|Application|Factory
    {
        $dishes = $this->dishesRepository->index();
        return view('vendors.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory
    {
        $restaurants = $this->dishesRepository->getRestaurants();
        $categories = $this->dishesRepository->getCategories();
        return view('vendors.dishes.add', compact('restaurants', 'categories'));
    }

    public function getSubcategories(Request $request): JsonResponse
    {
        $subcategories = $this->dishesRepository->getSubCategories($request->category_id);
        return response()->json($subcategories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddDishesRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $this->dishesRepository->create($data);
        return redirect()->route('vendors.dishes')->with('success', 'Dish added successfully');
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
        $dish = $this->dishesRepository->find($id);
        $restaurants = $this->dishesRepository->getRestaurants();
        $categories = $this->dishesRepository->getCategories();
        $subcategories = $this->dishesRepository->getSubCategories($dish['category_id']);
        return view(
            'vendors.dishes.edit',
            compact('dish', 'restaurants', 'categories', 'subcategories')
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDishesRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $this->dishesRepository->update($data);
        return redirect()->route('vendors.dishes')->with('success', 'Dish updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(int $id): RedirectResponse
    {
        $this->dishesRepository->delete($id);
        return redirect()->route('vendors.dishes')->with('success', 'Dish deleted successfully');
    }
}

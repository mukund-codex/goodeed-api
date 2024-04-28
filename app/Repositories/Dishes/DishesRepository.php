<?php

namespace App\Repositories\Dishes;

use App\Models\Category;
use App\Models\Dishes;
use App\Models\Restaurant;
use App\Models\Subcategory;
use App\Repositories\Restaurant\RestaurantInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class DishesRepository implements DishesInterface
{
    private Dishes $dishes;
    public function __construct(Dishes $dishes)
    {
        $this->dishes = $dishes;
    }

    public function index(): Collection
    {
        return $this->dishes
            ->select('dishes.*', 'restaurants.name as restaurant_name', 'categories.name as category_name', 'subcategories.name as subcategory_name')
            ->join('restaurants', 'restaurants.id', 'dishes.restaurant_id')
            ->leftJoin('categories', 'categories.id', 'dishes.category_id')
            ->leftJoin('subcategories', 'subcategories.id', 'dishes.subcategory_id')
            ->where('restaurants.vendor_id', '=', Auth::guard('vendor')->user()->id)
            ->get();
    }

    public function list(int $id): Collection
    {
        return $this->dishes->where('restaurant_id', $id)
            ->where('is_active', 1)->where('verified', 1)
            ->with('restaurant')
            ->with('category')
            ->with('subcategory')
            ->get();
    }

    public function create(array $input): Dishes
    {
        return $this->dishes->create($input);
    }

    public function update(array $input): Dishes
    {
        $dishes = $this->dishes->where('id', $input['id'])->first();
        $dishes->update($input);
        return $dishes;
    }

    public function getDishes(array $input): Dishes
    {
        return $this->dishes->where('id', $input['id'])->first();
    }

    public function getRestaurants(): Collection
    {
        return Restaurant::select('id', 'name')
            ->where('is_active', true)
            ->where('verified', true)
            ->where('vendor_id', Auth::guard('vendor')->user()->id)
            ->orderBy('name', 'asc')
            ->get();
    }

    public function getCategories(): Collection
    {
        return Category::select('id', 'name')
            ->where('status', true)
            ->get();
    }

    public function getSubCategories(int $category_id): Collection
    {
        return Subcategory::select('id', 'name')
            ->where('status', true)
            ->where('category_id', $category_id)
            ->get();
    }

    public function find(int $id): Dishes
    {
        return $this->dishes->find($id);
    }

    public function delete(int $id): void
    {
        $this->dishes->where('id', $id)->delete();
    }
}

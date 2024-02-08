<?php

namespace App\Repositories\Dishes;

use App\Models\Dishes;
use App\Repositories\Restaurant\RestaurantInterface;

class DishesRepository implements DishesInterface
{
    private Dishes $dishes;
    public function __construct(Dishes $dishes)
    {
        $this->dishes = $dishes;
    }

    public function list(int $id): Dishes
    {
        return $this->dishes->where('restaurant_id', $id)
            ->where('is_active', 1)->where('verified', 1)
            ->with('restaurant')->get();
    }

    public function create(array $input): Dishes
    {
        return $this->dishes->create($input);
    }

    public function update(array $input): Dishes
    {
        return $this->dishes->where('id', $input['id'])->update($input);
    }

    public function getDishes(array $input): Dishes
    {
        return $this->dishes->where('id', $input['id'])->first();
    }
}

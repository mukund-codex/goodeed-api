<?php

namespace App\Repositories\Dishes;

use App\Models\Dishes;
use App\Repositories\Restaurant\RestaurantInterface;
use Illuminate\Database\Eloquent\Collection;

class DishesRepository implements DishesInterface
{
    private Dishes $dishes;
    public function __construct(Dishes $dishes)
    {
        $this->dishes = $dishes;
    }
    //8587070701
    public function list(int $id): Collection
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
        $dishes = $this->dishes->where('id', $input['id'])->first();
        $dishes->update($input);
        return $dishes;
    }

    public function getDishes(array $input): Dishes
    {
        return $this->dishes->where('id', $input['id'])->first();
    }
}

<?php

namespace App\Repositories\Dishes;

use App\Models\Dishes;

Interface DishesInterface
{
    public function list(int $id): Dishes;

    public function create(array $input): Dishes;

    public function update(array $input): Dishes;

    public function getDishes(array $input): Dishes;
}

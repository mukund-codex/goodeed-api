<?php

namespace App\Repositories\Dishes;

use App\Models\Dishes;
use Illuminate\Database\Eloquent\Collection;

Interface DishesInterface
{
    public function list(int $id): Collection;

    public function create(array $input): Dishes;

    public function update(array $input): Dishes;

    public function getDishes(array $input): Dishes;

    public function index(): Collection;

    public function getRestaurants(): Collection;

    public function getCategories(): Collection;

    public function getSubCategories(int $category_id): Collection;

    public function find(int $id): Dishes;

    public function delete(int $id): void;
}

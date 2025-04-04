<?php

namespace App\Repositories\Restaurant;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Collection;

interface  RestaurantInterface
{
    public function list(): Collection;

    public function create(array $data): Restaurant;

    public function update(array $data): Restaurant;

    public function index(int $vendorId): Collection;

    public function find(int $id): Restaurant;

    public function delete(int $id): bool;
}

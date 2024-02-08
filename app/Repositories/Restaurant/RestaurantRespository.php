<?php

namespace App\Repositories\Restaurant;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Collection;

class RestaurantRespository implements RestaurantInterface
{

    private Restaurant $restaurant;

    public function __construct(Restaurant $restaurant)
    {
        $this->restaurant = $restaurant;
    }

    public function list(): Collection
    {
        return $this->restaurant
            ->where('is_active', true)
            ->where('verified', true)
            ->get();
    }

    public function create(array $data): Restaurant
    {
        return $this->restaurant->create($data);
    }

    public function update(array $data): Restaurant
    {
        $restaurant = $this->restaurant->find($data['id']);
        $restaurant->update($data);
        return $restaurant;
    }

}

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

}

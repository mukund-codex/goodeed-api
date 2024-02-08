<?php

namespace App\Repositories\Restaurant;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Collection;

interface  RestaurantInterface
{
    public function list(): Collection;
}

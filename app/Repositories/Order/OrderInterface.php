<?php

namespace App\Repositories\Order;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

interface  OrderInterface
{

    public function list(int $id): Collection|array;

    public function create(array $request): Order;

    public function update(array $request): Order;

    public function getOrder(int $id): Order;

}

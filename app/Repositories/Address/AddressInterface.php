<?php

namespace App\Repositories\Address;

use App\Models\Address;
use Illuminate\Database\Eloquent\Collection;

interface  AddressInterface
{
    public function getAddress(int $userId): Collection;
    public function addAddress(int $userId, array $data): Address;
    public function updateAddress(int $userId, int $addressId, array $data): Address;
    public function deleteAddress(int $userId, int $addressId): void;
}

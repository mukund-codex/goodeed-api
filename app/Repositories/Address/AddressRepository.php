<?php

namespace  App\Repositories\Address;

use App\Models\Address;
use Illuminate\Database\Eloquent\Collection;

class AddressRepository
{
    private Address $address;

    public function __construct(Address $address)
    {
        $this->address = $address;
    }

    public function getAddress(int $userId): Collection
    {
        return $this->address->where('user_id', $userId)->get();

    }

    public function addAddress(int $userId, array $data): Address
    {
        $data['user_id'] = $userId;
        return $this->address->create($data);
    }

    public function updateAddress(int $userId, int $addressId, array $data): Address
    {
        $address = $this->address->where('user_id', $userId)->where('id', $addressId)->first();
        $address->update($data);
        return $address;
    }

    public function deleteAddress(int $userId, int $addressId): void
    {
        $this->address->where('user_id', $userId)->where('id', $addressId)->delete();
    }
}

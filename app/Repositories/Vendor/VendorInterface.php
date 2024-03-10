<?php

namespace App\Repositories\Vendor;

use App\Models\Vendor;

interface VendorInterface
{
    public function login(array $data): Vendor;

    public function verifyOtp(array $data): Vendor;

}

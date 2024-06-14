<?php

namespace App\Repositories\Vendor;

use App\Models\Vendor;
use Illuminate\Http\RedirectResponse;

interface VendorInterface
{
    public function login(array $data): Vendor;

    public function verifyOtp(array $data): Vendor;

    public function create(array $data): RedirectResponse;

    public function loginHandler(array $data): array;

    public function verify(string $token): RedirectResponse;

    public function dashboard(): array;

}

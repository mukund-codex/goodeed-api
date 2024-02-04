<?php

namespace App\Repositories\User;

use App\Models\User;

interface  UserInterface
{
    public function login(array $data): User;

    public function verifyOtp(array $data): User;

    public function getUserProfile(int $id): User;

    public function updateUserProfile(int $id, array $data): User;
}

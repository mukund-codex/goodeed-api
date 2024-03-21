<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'email_verified_at' => now(),
            'is_email_verified' => true,
            'password' => Hash::make('password'),
            'mobile_number' => '1234567890',
            'status' => config('constants.STATUS.ACTIVE'),
            'is_mobile_verified' => true,
            'is_active' => true,
            'is_deleted' => false,
            'is_blocked' => false,
            'type' => config('constants.USER_TYPE.ADMIN'),
        ]);
    }
}

<?php

use App\Http\Controllers\v1\AddressController;
use App\Http\Controllers\v1\DishesController;
use App\Http\Controllers\v1\OrderController;
use App\Http\Controllers\v1\RestaurantController;
use App\Http\Controllers\v1\UserController;
use App\Http\Controllers\v1\VendorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {
    Route::get('/', function () {
        return ['Laravel' => app()->version()];
    })->name('api.v1');

    Route::prefix('user')->group(function () {
        Route::post('login', [UserController::class, 'login'])->name('user.login');

        Route::middleware(['auth:sanctum'])->group(function () {
            // Verify OTP
            Route::post('verify-otp', [UserController::class, 'verifyOtp'])->name('user.verify-otp');

            // User Profile
            Route::get('profile', [UserController::class, 'getUserProfile'])->name('user.profile');
            Route::put('profile', [UserController::class, 'updateUserProfile'])->name('user.update-profile');

            // Address
            Route::get('address', [AddressController::class, 'getAddress'])->name('user.address');
            Route::post('address', [AddressController::class, 'addAddress'])->name('user.add-address');
            Route::put('address/{id}', [AddressController::class, 'updateAddress'])->name('user.update-address');
            Route::delete('address/{id}', [AddressController::class, 'deleteAddress'])->name('user.delete-address');

            // Logout
            Route::post('logout', [UserController::class, 'logout'])->name('user.logout');

            //Restaurant
            Route::get('restaurants', [RestaurantController::class, 'list'])->name('rest.list');
            Route::post('restaurants', [RestaurantController::class, 'create'])->name('rest.create');
            Route::put('restaurants/{id}', [RestaurantController::class, 'update'])->name('rest.update');

            //Dishes
            Route::get('dishes/list/{id}', [DishesController::class, 'list'])->name('dishes.list');
            Route::post('dishes', [DishesController::class, 'create'])->name('dishes.create');
            Route::put('dishes/{id}', [DishesController::class, 'update'])->name('dishes.update');
            Route::get('dishes/{id}', [DishesController::class, 'getDishes'])->name('dishes.get');

            //Orders
            Route::get('orders', [OrderController::class, 'list'])->name('orders.list');
            Route::post('orders', [OrderController::class, 'create'])->name('orders.create');
            Route::put('orders/{id}', [OrderController::class, 'update'])->name('orders.update');
            Route::get('orders/{id}', [OrderController::class, 'getOrder'])->name('orders.get');
        });
    });

    Route::prefix('vendor')->group(function () {
        Route::post('login', [VendorController::class, 'login'])->name('vendor.login');

        Route::middleware(['auth:sanctum'])->group(function () {
            Route::post('verify-otp', [VendorController::class, 'verifyOtp'])->name('vendor.verify-otp');
        });

    });
});

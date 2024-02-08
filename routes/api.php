<?php

use App\Http\Controllers\v1\AddressController;
use App\Http\Controllers\v1\RestaurantController;
use App\Http\Controllers\v1\UserController;
use Illuminate\Http\Request;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::prefix('v1')->group(function () {
    Route::get('/', function () {
        return ['Laravel' => app()->version()];
    })->name('api.v1');

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
    });
});

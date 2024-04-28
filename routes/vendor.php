<?php

use App\Http\Controllers\vendors\DishesController;
use App\Http\Controllers\vendors\RestaurantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\vendors\VendorController;

Route::prefix('vendors')->name('vendors.')->group(function () {

    Route::middleware([])->group(function () {
        Route::view('/login', 'vendors.auth.login')->name('login');
        Route::post('/login-handler', [VendorController::class, 'loginHandler'])->name('login-handler');
        Route::view('/register', 'vendors.auth.register')->name('register');
        Route::post('/create', [VendorController::class, 'create'])->name('create');
        Route::get('/account/verify/{token}', [VendorController::class, 'verify'])->name('verify');
        Route::get('/register-success', [VendorController::class, 'registerSuccess'])->name('register-success');
    });

    Route::middleware([])->group(function () {
        Route::view('/dashboard', 'vendors.dashboard')->name('dashboard');
        Route::post('/logout-handler', [VendorController::class, 'logoutHandler'])->name('logout-handler');

        // Restaurants Routes
        Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants');
        Route::view('/restaurant/add', 'vendors.restaurants.add')->name('restaurant.add');
        Route::post('/restaurants/create', [RestaurantController::class, 'store'])->name('restaurants.create');
        Route::get('/restaurants/edit/{id}', [RestaurantController::class, 'edit'])->name('restaurants.edit');
        Route::post('/restaurants/update/{id}', [RestaurantController::class, 'update'])->name('restaurants.update');
        Route::get('/restaurants/delete/{id}', [RestaurantController::class, 'delete'])->name('restaurants.delete');


        // Dishes Routes
        Route::get('/dishes', [DishesController::class, 'index'])->name('dishes');
        Route::get('/dishes/add', [DishesController::class, 'create'])->name('dishes.add');
        Route::post('/dishes/create', [DishesController::class, 'store'])->name('dishes.create');
        Route::get('/dishes/edit/{id}', [DishesController::class, 'edit'])->name('dishes.edit');
        Route::post('/dishes/update/{id}', [DishesController::class, 'update'])->name('dishes.update');
        Route::get('/dishes/delete/{id}', [DishesController::class, 'delete'])->name('dishes.delete');

        Route::post('/get-subcategories', [DishesController::class, 'getSubcategories'])->name('get-subcategories');

    });

});

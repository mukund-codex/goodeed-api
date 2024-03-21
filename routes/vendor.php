<?php

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
    });

});

<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware(['guest:admin'])->group(function () {
        Route::view('/login', 'admin.auth.login')->name('login');
        Route::post('/login_handler', [AdminController::class, 'loginHandler'])->name('login_handler');
    });

    Route::middleware(['auth:admin'])->group(function () {
        Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
        Route::post('/logout_handler', [AdminController::class, 'logoutHandler'])->name('logout_handler');

        Route::get('/category',[CategoryController::class, 'index'])->name('category');
        Route::view('/category/add', 'admin.category-add')->name('category.add');
        Route::post('/category_handler', [CategoryController::class, 'categoryHandler'])->name('category_handler');
        Route::put('/category_update/{id}', [CategoryController::class, 'categoryUpdate'])->name('category_update');
        Route::get('/category_delete/{id}', [CategoryController::class, 'categoryDelete'])->name('category_delete');
    });
});

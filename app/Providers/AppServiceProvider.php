<?php

namespace App\Providers;

use App\Models\Address;
use App\Models\User;
use App\Repositories\Address\AddressInterface;
use App\Repositories\Address\AddressRepository;
use App\Repositories\User\UserInterface;
use App\Repositories\User\UserRepository;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(UserInterface::class, UserRepository::class);
        $this->app->singleton(AddressInterface::class, AddressRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Relation::morphMap([
            'user' => User::class,
            'address' => Address::class,
        ]);
    }
}

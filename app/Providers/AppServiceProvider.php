<?php

namespace App\Providers;

use App\Models\Address;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Dishes;
use App\Models\Order;
use App\Models\Restaurant;
use App\Models\User;
use App\Models\Vendor;
use App\Repositories\Address\AddressInterface;
use App\Repositories\Address\AddressRepository;
use App\Repositories\Restaurant\RestaurantInterface;
use App\Repositories\Restaurant\RestaurantRepository;
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
        $this->app->singleton(RestaurantInterface::class, RestaurantRepository::class);
        $this->app->singleton('DishesInterface', 'DishesRepository::class');
        $this->app->singleton('OrderInterface', 'OrderRepository::class');
        $this->app->singleton('VendorInterface', 'VendorRepository::class');
        $this->app->singleton('AdminInterface', 'AdminRepository::class');
        $this->app->singleton('CategoryInterface', 'CategoryRepository::class');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Relation::morphMap([
            'user' => User::class,
            'address' => Address::class,
            'restaurant' => Restaurant::class,
            'dishes' => Dishes::class,
            'order' => Order::class,
            'vendor' => Vendor::class,
            'admin' => Admin::class,
            'category' => Category::class,
        ]);
    }
}

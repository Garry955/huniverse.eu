<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Group;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('partials.header', function ($view) {
            $cartTotal = Cart::getTotal();
            $groups = Group::latest()->get();
            $view->with(['cartTotal' => $cartTotal, 'groups' => $groups]);
        });
    }
}

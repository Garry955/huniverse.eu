<?php

namespace App\Providers;

use App\Models\Cart;
use App\Models\Group;
use App\Models\Landing;
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
            $landings = Landing::where([
                ['place', '=', 'both'],
                ['name', '!=', 'order-success'],
            ])->orWhere('place', 'header')->get();
            $view->with(['cartTotal' => $cartTotal, 'groups' => $groups, 'landings' => $landings]);
        });

        view()->composer('partials.footer', function ($view) {

            $menus = Landing::where([
                ['place', '=', 'both'],
                ['name', '!=', 'order-success'],
            ])->get();
            $links = Landing::where([
                ['place', '=', 'footer'],
                ['name', '!=', 'order-success'],
            ])->get();
            $view->with(['menus' => $menus, 'links' => $links]);
        });
    }
}

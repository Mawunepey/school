<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        // Blade::component('navbar', \App\View\Components\Navbar::class);
//         Blade::component('footer', \App\View\Components\Footer::class);
//         Blade::component('responsive-nav-link', \App\View\Components\ResponsiveNavLink::class);
//         Blade::component('dropdown-link', \App\View\Components\DropdownLink::class);
//         Blade::component('nav-link', \App\View\Components\NavLink::class);
//         Blade::component('dropdown', \App\View\Components\Dropdown::class);
//         Blade::component('dropdown-button', \App\View\Components\DropdownButton::class);

    }
}

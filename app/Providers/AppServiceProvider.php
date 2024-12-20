<?php

namespace App\Providers;

use App\Views\Composers\MenuComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // View::share('menu', [
        //     'Home' => '/',
        //     'About' => '/about',
        //     'Contact' => '/contact'
        // ]);

        View::composer('*', MenuComposer::class);
    }
}

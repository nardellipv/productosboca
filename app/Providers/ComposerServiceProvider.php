<?php

namespace productosboca\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view::composer(['parts._menu','parts.cart._cart'],'productosboca\Http\ServiceProvider\MenuProvider');
        view::composer(['parts.product._aside'],'productosboca\Http\ServiceProvider\Aside');
    }
}

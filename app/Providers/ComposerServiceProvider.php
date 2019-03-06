<?php

namespace bocaamerica\Providers;

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
        view::composer(['parts._menu', 'parts.cart._cart', 'parts._header', 'admin.parts.dashboard._widget'], 'bocaamerica\Http\ServiceProvider\MenuProvider');
        view::composer(['parts.product._aside'], 'bocaamerica\Http\ServiceProvider\Aside');
    }
}

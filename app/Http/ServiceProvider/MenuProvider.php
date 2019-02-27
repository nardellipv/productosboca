<?php
/**
 * Created by PhpStorm.
 * User: narde
 * Date: 8/2/2019
 * Time: 16:01
 */

namespace productosboca\Http\ServiceProvider;


use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use productosboca\Cart;
use productosboca\Category;

class MenuProvider
{
    public function compose(View $view)
    {
        $costoEnvio = File::get(storage_path('app/public/envio.txt'));

        $categories = Category::where('status', 'ACTIVE')
            ->get();

        $cartAdded = Cookie::get('compra');

        $totalCart = Cart::where('serial_buy', $cartAdded)
            ->sum('total');

        $countCart = Cart::where('serial_buy', $cartAdded)
            ->count('serial_buy');

        $view->with([
            'categories' => $categories,
            'totalCart' => $totalCart,
            'countCart' => $countCart,
            'costoEnvio' => $costoEnvio,
        ]);
    }
}
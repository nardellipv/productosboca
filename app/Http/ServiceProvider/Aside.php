<?php

namespace bocaamerica\Http\ServiceProvider;


use bocaamerica\Product;
use Illuminate\View\View;

class aside
{
    public function compose(View $view)
    {
        $lastItems = Product::where('section', 'MOSTSELL')
            ->orderBy('created_at', 'DESC')
            ->take(4)
            ->get();

        $lastFourItems = Product::orderBy('created_at', 'DESC')
            ->skip(4)
            ->take(4)
            ->get();


        $view->with([
            'lastFourItems' => $lastFourItems,
            'lastItems' => $lastItems
        ]);
    }
}
<?php

namespace bocaamerica\Http\Controllers;

use bocaamerica\Product;
use bocaamerica\ProductSize;

class HomeController extends Controller
{
    public function index()
    {
        $productsBanner = Product::where('section', 'BANNER')
            ->orderBy('created_at', 'DESC')
            ->take(3)
            ->get();


        $newProducts = Product::where('section', 'NEW')
            ->orderBy('created_at', 'DESC')
            ->take(4)
            ->get();

        $mostSells = Product::where('section', 'MOSTSELL')
            ->orderBy('created_at', 'DESC')
            ->take(4)
            ->get();

        return view('home', compact('productsBanner', 'newProducts', 'mostSells'));
    }

    public function thanks()
    {
        return view('parts.cart._thanks');
    }
}

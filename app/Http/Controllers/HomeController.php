<?php

namespace productosboca\Http\Controllers;

use Illuminate\Http\Request;
use productosboca\Category;
use productosboca\Picture;
use productosboca\Product;
use productosboca\ProductSize;

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

    public function quickView($slug)
    {

        $quickView = Product::where('slug', $slug)
            ->first();

        $sizes = ProductSize::with(['size'])
            ->where('product_id', $quickView->id)
            ->get();


        return view('parts.home._quickView', compact('quickView', 'sizes'));
    }
}

<?php

namespace productosboca\Http\Controllers;

use Illuminate\Http\Request;
use productosboca\Category;
use productosboca\Product;

class CategoryController extends Controller
{
    public function index($slug)
    {
        $category = Category::where('slug', $slug)
            ->first();

        $products = Product::where('category_id', $category->id)
            ->orderBy('price', 'ASC')
            ->paginate(12);

        $lastItems = Product::where('category_id', $category->id)
            ->orderBy('created_at', 'ASC')
            ->get();

        return view('parts.product._category', compact('products', 'category', 'lastItems'));
    }
}

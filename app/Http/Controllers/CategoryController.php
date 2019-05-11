<?php

namespace bocaamerica\Http\Controllers;

use bocaamerica\Category;
use bocaamerica\Product;

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

        $categories = Category::where('status', 'ACTIVE')
            ->get();

        return view('parts.product._category', compact('products', 'category', 'lastItems', 'categories'));
    }
}

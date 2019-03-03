<?php

namespace productosboca\Http\Controllers\Admin;

use Illuminate\Http\Request;
use productosboca\Category;
use productosboca\Http\Controllers\Controller;
use productosboca\Product;
use productosboca\User;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::with(['category'])
            ->get();

        $users = User::all();

        $countUsers = User::count();
        $countProduct = Product::count();
        $countCategory = Category::count();

        return view('admin.parts._admin', compact('users', 'products','countCategory','countProduct','countUsers'));
    }
}

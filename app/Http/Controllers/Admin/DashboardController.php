<?php

namespace bocaamerica\Http\Controllers\Admin;

use bocaamerica\Checkout;
use bocaamerica\Category;
use bocaamerica\Http\Controllers\Controller;
use bocaamerica\NewsLetter;
use bocaamerica\Product;
use bocaamerica\User;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::with(['category'])
            ->get();

        $buys = Checkout::all();

        $users = User::all();

        $newsLetters = NewsLetter::all();

        $countUsers = User::count();
        $countProduct = Product::count();
        $countCategory = Category::count();

        return view('admin.parts._admin', compact('users', 'products','countCategory','countProduct','countUsers','buys','newsLetters'));
    }
}

<?php

namespace bocaamerica\Http\Controllers;

use bocaamerica\Category;
use bocaamerica\Http\Requests\NewsLetterRequest;
use bocaamerica\NewsLetter;
use bocaamerica\Product;
use bocaamerica\ProductSize;

class HomeController extends Controller
{
    public function index()
    {
        $newProducts = Product::where('section', 'NEW')
            ->orderBy('created_at', 'DESC')
            ->take(4)
            ->get();

        $mostSells = Product::where('section', 'MOSTSELL')
            ->orderBy('created_at', 'DESC')
            ->take(4)
            ->get();

        $offers = Product::where('offer', '!=', 'NULL')
            ->orderBy('offer', 'DESC')
            ->take(3)
            ->get();

        $expensive = Product::orderBy('price', 'DESC')
            ->first();

        return view('home', compact('newProducts', 'mostSells', 'offers', 'expensive'));
    }

    public function newsLetter(NewsLetterRequest $request)
    {
        $news_letter = new NewsLetter();
        $news_letter->fill($request->all())->save();

        return view('parts.home._thanksNewsLetter');
    }

    public function thanks()
    {
        return view('parts.cart._thanks');
    }

    public function pendiente()
    {
        return view('parts.cart._error');
    }

    public function error()
    {
        return view('parts.cart._pending');
    }
}

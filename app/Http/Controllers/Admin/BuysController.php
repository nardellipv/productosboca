<?php

namespace bocaamerica\Http\Controllers\Admin;

use bocaamerica\Cart;
use bocaamerica\Checkout;
use Illuminate\Http\Request;
use bocaamerica\Http\Controllers\Controller;

class BuysController extends Controller
{
    public function index()
    {
        $buys = Checkout::join('carts', 'checkouts.serial_buy','carts.serial_buy')
            ->get();


        return view('admin.parts.buys._listBuys', compact('buys'));
    }
}

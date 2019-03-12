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
            ->join ('products','products.id','carts.product_id')
            ->select('checkouts.id as chId','checkouts.name as chName', 'checkouts.email','checkouts.lastname','checkouts.address','checkouts.state',
            'checkouts.city','checkouts.phone','checkouts.postalcode','checkouts.note','checkouts.status','checkouts.payment','carts.serial_buy',
                'carts.quantity as cQuantity','carts.total','products.name as productName','carts.created_at','carts.product_id as productId',
                'carts.size as caSize')
            ->get();


        return view('admin.parts.buys._listBuys', compact('buys'));
    }
}

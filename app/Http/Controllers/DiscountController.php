<?php

namespace bocaamerica\Http\Controllers;

use Illuminate\Support\Facades\Cookie;
use bocaamerica\Cart;
use bocaamerica\Discount;
use bocaamerica\Http\Requests\DiscountRequest;

class DiscountController extends Controller
{
    public function coupon(DiscountRequest $request)
    {
        $serial_buy = Cookie::get('compra');

        $compraSum = Cart::where('serial_buy', $serial_buy)
            ->sum('total');

        $discount = Discount::where('coupon', $request->coupon)
            ->where('status', 'ACTIVE')
            ->first();

        $productCarts = Cart::with(['product'])
            ->where('serial_buy', $serial_buy)
            ->get();

        if (empty($discount)) {
            return back();
        }

        if ($discount->status == 'ACTIVE') {
            $resto = ($compraSum * $discount->discount) / 100;
            $subTotal = $compraSum - $resto;
        }

        return view('parts.cart._cart', compact('subTotal','productCarts'));
    }
}

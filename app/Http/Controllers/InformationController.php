<?php

namespace productosboca\Http\Controllers;

use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function envios()
    {
        return view('parts.information._sending');
    }

    public function payments()
    {
        return view('parts.information._payments');
    }

    public function buy()
    {
        return view('parts.information._whoBuy');
    }

    public function termns()
    {
        return view('parts.information._termCondition');
    }

    public function policity()
    {
        return view('parts.information._policity');
    }
}

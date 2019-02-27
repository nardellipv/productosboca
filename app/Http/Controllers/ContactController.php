<?php

namespace productosboca\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use productosboca\Http\Requests\ContactClientRequest;

class ContactController extends Controller
{
    public function contactWeb()
    {
        return view('parts._contact');
    }

    public function sendEmail(ContactClientRequest $request)
    {
        Mail::send('email._contactWeb', $request->all(), function ($msj) use ($request) {
            $msj->from($request->email, $request->name);
            $msj->subject('Contacto Sitio Web - Boca América');
            $msj->to('info@bocaamerica.com', 'BocaAmerica');
        });

        Session::flash('message', 'Su mensaje se mando correctamente, a la brevedad nos pondremos en contacto con usted.');
        return back();
    }
}

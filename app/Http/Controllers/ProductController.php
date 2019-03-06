<?php

namespace bocaamerica\Http\Controllers;

use Andreani\Andreani;
use Andreani\Requests\CotizarEnvio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use bocaamerica\Http\Requests\ReviewRequest;
use bocaamerica\Picture;
use bocaamerica\Product;
use bocaamerica\ProductSize;
use bocaamerica\Review;

class ProductController extends Controller
{
    public function index($slug)
    {

        $tarifa = 0;

        $product = Product::where('slug', $slug)
            ->first();

        $pictures = Picture::where('product_id', $product->id)
            ->get();

        $sizes = ProductSize::with(['size'])
            ->where('product_id', $product->id)
            ->get();

        $relateds = Product::where('category_id', $product->category_id)
            ->take(4)
            ->get();

        $reviews = Review::with(['user'])
            ->where('product_id', $product->id)
            ->get();

        if (Auth::check()) {
            $userReview = Review::where('user_id', auth::user()->id)
                ->where('product_id', $product->id)
                ->first();
        }

        return view('parts.product._product', compact('product', 'pictures', 'sizes', 'relateds', 'reviews',
            'tarifa', 'userReview'));
    }

    public function calcular($slug, Request $request)
    {
        $product = Product::where('slug', $slug)
            ->first();

        $pictures = Picture::where('product_id', $product->id)
            ->get();

        $sizes = ProductSize::with(['size'])
            ->where('product_id', $product->id)
            ->get();

        $relateds = Product::where('category_id', $product->category_id)
            ->take(5)
            ->get();

        $reviews = Review::with(['user'])
            ->where('product_id', $product->id)
            ->get();

        $envio = $request->envio;

        //habilitar la extension soap en php.ini
        $request = new CotizarEnvio();
        $request->setCodigoDeCliente('CL0003750');
        $request->setNumeroDeContrato('400006709');
        $request->setCodigoPostal($envio);
        $request->setPeso(2000);
        $request->setVolumen(100);
        $request->setValorDeclarado(100);

        $andreani = new Andreani('STAGING_WS', 'ANDREANI', 'prod');
        $response = $andreani->call($request);

        if ($response->isValid()) {
            $tarifa = $response->getMessage()->CotizarEnvioResult->Tarifa;
        } else {
            $tarifa = -1;
        }
        return view('parts.product._product', compact('product', 'pictures', 'sizes', 'relateds', 'tarifa', 'reviews'));
    }

    public function rating($id, ReviewRequest $request)
    {
        $review = new Review();
        $review->review = $request['review'];
        $review->product_id = $id;
        $review->user_id = auth::user()->id;
        $review->save();

        $rating = Product::find($id);
        $rating->rating = ($request->rating + $rating->rating) / 2;
        $rating->save();

        Session::flash('message', 'Gracias por tu review. Aydaste a otros usuarios. ');
        return back();
    }
}

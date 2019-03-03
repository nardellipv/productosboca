<?php

namespace productosboca\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use productosboca\Category;
use productosboca\Http\Controllers\Controller;
use productosboca\Picture;
use productosboca\Product;
use Image;
use productosboca\ProductSize;
use productosboca\Size;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::with(['category'])
            ->get();

        return view('admin.parts.products._listProduct', compact('products'));
    }

    public function edit($id)
    {
        $product = Product::find($id);

        $sizes = Size::all();

        $categories = Category::all();

        $product_size = ProductSize::where('product_id', $product->id)
            ->get();

        $pictures = Picture::where('product_id', $product->id)
            ->get();

        return view('admin.parts.products._editProduct', compact('product', 'sizes', 'product_size', 'categories', 'pictures'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->slug = str_slug($request['name']);
        $product->fill($request->all())->save();

        //        guardamos talles
        if ($request->size) {
            $sizes = $request['size'];
            foreach ($sizes as $size) {
                ProductSize::create([
                    'size_id' => $size,
                    'product_id' => $product->id,
                ]);
            }
        }

        $thums = new Picture();
        $thums->name = $product->name;
        $thums->url = $request['thum'];
        $thums->product_id = $product->id;
        $thums->save();

        if ($request->thum) {
            $image = $request->file('thum');
            $input['thum'] = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = 'images/products';
            $image->move($destinationPath, $input['thum']);

            $thums->url = $input['thum'];
        }

        $thums->update();


        Session::flash('message', 'Producto agregado correctamente');
        return back();
    }

    public function create()
    {
        $categories = Category::where('status', 'ACTIVE')
            ->get();

        $sizes = Size::all();

        return view('admin.parts.products._createProduct', compact('categories', 'sizes'));
    }

    public function store(Request $request)
    {

//        guardamos producto
        $product = new Product();
        $product->slug = str_slug($request['name']);
        $product->fill($request->all())->save();

        //        guardamos talles
        $sizes = $request['size'];
        foreach ($sizes as $size) {
            ProductSize::create([
                'size_id' => $size,
                'product_id' => $product->id,
            ]);
        }

        if ($request->photo) {
            $image = $request->file('photo');
            $input['photo'] = time() . '.' . $image->getClientOriginalExtension();

            $destinationPath = 'images/products';
            $image->move($destinationPath, $input['photo']);

            $product->photo = $input['photo'];
        }

        $product->update();


        Session::flash('message', 'Producto agregado correctamente');
        return back();
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return back();
    }

    public function write(Request $request)
    {
        $content = $request->value;

        Storage::put('public/envio.txt', $content);

        return back();
    }
}

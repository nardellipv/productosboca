<?php

namespace productosboca\Http\Controllers\Profile;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use productosboca\Cart;
use productosboca\Http\Controllers\Controller;
use productosboca\Http\Requests\DataClientProfileRequest;
use productosboca\User;

class ProfileController extends Controller
{
    public function profile()
    {
        $user = User::where('id', Auth::user()->id)
            ->first();

        $pedidos = Cart::with(['product'])
            ->where('user_id', $user->id)
            ->where('status', 'CHECKOUT')
            ->orderBy('Created_at', 'DESC')
            ->get();

        return view('parts.profile._profile', compact('user', 'pedidos'));
    }

    public function updateData($id, DataClientProfileRequest $request)
    {
        $updateData = User::find($id);
        $updateData->fill($request->except('password'))->save();

        Session::flash('message', 'Los datos se actualizaron correctamente');
        return back();
    }

    public function updatePassword($id, Request $request)
    {
        $updateData = User::find($id);
        $updateData->password = bcrypt($request['password']);
        $updateData->save();

        Session::flash('message', 'La contraseña se actualizó correctamente');
        return back();
    }
}

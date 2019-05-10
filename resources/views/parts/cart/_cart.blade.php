@extends('layouts.app')

@section('content')
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($productCarts as $productCart)
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            {{--<img src="{{ $productCart-> }}" alt="">--}}
                                            {!! Form::open(['method' => 'DELETE','route' => ['deleteItem', $productCart->id], 'style'=>'display:inline']) !!}
                                            {{ csrf_field() }}
                                            <button type="submit"
                                                    class="btn btn-warning btn-sm pull-right">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            {!! Form::Close() !!}
                                        </div>
                                        <div class="media-body">
                                            <p>{{ $productCart->product->name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if($productCart->product->offer)
                                        <h5> ${{ $productCart->product->offer }}</h5>
                                    @else
                                        <h5> ${{ $productCart->product->price }}</h5>
                                    @endif
                                </td>
                                <td>
                                    {{ $productCart->quantity }}
                                </td>
                                <td>
                                    @if($productCart->product->offer)
                                        ${{ $productCart->product->offer * $productCart->quantity }}
                                    @else
                                        ${{ $productCart->product->price * $productCart->quantity }}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        <tr class="bottom_button">
                            <td>
                                <p>Número de Orden: <b>{{ $serial_buy }}</b></p>
                            </td>
                            <td>
                            </td>
                            <td>
                            </td>
                            <td>
                                {!! Form::open(['method' => 'POST','route' => ['coupon'],'style'=>'display:inline']) !!}
                                {{ csrf_field() }}
                                <div class="cupon_text d-flex align-items-center">
                                    <input type="text" placeholder="Código Cupón" name="coupon">
                                    <button type="submit" class="primary-btn">Aplicar Cupón</button>
                                </div>
                                {!! Form::Close() !!}
                            </td>
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Subtotal</h5>
                            </td>
                            <td>
                                @if($subTotal == 0)

                                    <h5>${{ $totalCart }}</h5>
                                @else
                                    <del>
                                        <h6>${{ $totalCart }}</h6>
                                    </del>
                                    <h4>${{ $subTotal }}</h4>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="{{ url('/') }}" class="genric-btn primary-border">Continuar Comprando</a>
                                @if($countCart > 0)
                                    <a href="{{ url('/carrito/procesar-pago') }}" class="genric-btn primary">Procesar
                                        Pago</a>
                                @else
                                    <button class="genric-btn primary disabled">Procesar
                                        Pago</button>
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
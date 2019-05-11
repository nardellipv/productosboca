@extends('layouts.app')

@section('title', $category->name)

@section('content')
    <div class="container" style="margin-top: 60px;">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
                @include('parts.product._aside')
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <h3 style="margin-top: 13px; color: yellow">Categoría {{ $category->name }}</h3>
                </div>
                <section class="lattest-product-area pb-40 category-list">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-lg-4 col-md-6">
                                <div class="single-product">
                                    <img class="img-fluid" src="{{ asset('images/products/'.$product->photo) }}" alt="{{ $product->name }}">
                                    @if($product->quantity == 0)
                                        <b>Sin Stock</b>
                                    @endif
                                    <div class="product-details">
                                        <h6><a href="{{ url('producto', $product->slug) }}">{{ str_limit($product->name, 21) }}</a></h6>
                                        <div class="price">
                                            @if($product->offer)
                                                <h6>${{ $product->offer }}</h6>
                                                <h6 class="l-through">${{ $product->price }}</h6>
                                            @else
                                                <h6>${{ $product->price }}</h6>
                                            @endif
                                        </div>
                                        <div class="prd-bottom">
                                            <a href="{{ url('producto', $product->slug) }}" class="social-info">
                                                <span class="ti-bag"></span>
                                                <p class="hover-text">Ver Producto</p>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
                <div class="filter-bar d-flex flex-wrap align-items-center">
                    <div class="sorting mr-auto">

                    </div>
                        {{ $products->render() }}
                </div>
            </div>
        </div>
    </div>
@endsection
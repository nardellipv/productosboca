@extends('layouts.app')

@section('content')
    <div class="content">
        <div class="products-agileinfo">
            <h2 class="tittle">{{ $category->name }}</h2>
            <div class="container">
                <div class="product-agileinfo-grids w3l">
                    @include('parts.product._aside')
                    <div class="col-md-9 product-agileinfon-grid1 w3l">
                        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                            <br><br>
                            <ul id="myTab" class="nav1 nav1-tabs left-tab" role="tablist">
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="home"
                                         aria-labelledby="home-tab">
                                        <div class="product-tab">
                                            @foreach($products as $product)
                                                <div class="col-md-4 product-tab-grid simpleCart_shelfItem">
                                                    <div class="grid-arr">
                                                        <div class="grid-arrival">
                                                            <figure>
                                                                <a href="#" class="new-gri" data-toggle="modal"
                                                                   data-target="#myModal1">
                                                                    <div class="grid-img">
                                                                        <img src="{{ asset('images/products/'.$product->photo) }}"
                                                                             class="img-responsive"
                                                                             alt="">
                                                                    </div>
                                                                    <div class="grid-img">
                                                                        <img src="{{ asset('images/products/'.$product->photo) }}" class="img-responsive"
                                                                             alt="">
                                                                    </div>
                                                                </a>
                                                            </figure>
                                                        </div>
                                                        @if($product->quantity == 0)
                                                            <div class="ribben1">
                                                                <p>Sin Stock</p>
                                                            </div>
                                                        @endif
                                                        <div class="women">
                                                            <h6><a href="{{ url('producto', $product->slug) }}">{{ str_limit($product->name,20) }}</a></h6>
                                                            <div class="block star-rating" style="margin-left: 38%;">
                                                                <div class="back-stars small ghosting">
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>

                                                                    <div class="front-stars" style="width: {{$product->rating}}%">
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <span class="size">Precio:</span>
                                                            @if($product->offer)
                                                                <h5>
                                                                    <del>${{ $product->price }}</del>
                                                                </h5>
                                                                <h4 class="item_price">${{ $product->offer }}</h4>
                                                            @else
                                                                <p><em class="item_price">${{ $product->price }}</em></p>
                                                            @endif
                                                            <br>
                                                            <a href="{{ url('producto', $product->slug) }}" class="my-cart-b item_add">Ver Más</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
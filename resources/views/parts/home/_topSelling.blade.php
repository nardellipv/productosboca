<div class="new-arrivals-w3agile">
    <div class="container">
        <h3 class="tittle1">Más Vendidos</h3>
        <div class="arrivals-grids">
            @foreach($mostSells as $mostSell)
            <div class="col-md-3 arrival-grid simpleCart_shelfItem">
                <div class="grid-arr">
                    <div class="grid-arrival">
                        <figure>
                            <a href="{{ url('producto', $mostSell->slug) }}">
                                <div class="grid-img">
                                    <img src="{{ asset('images/products/'.$mostSell->photo) }}" class="img-responsive" alt="{{ $mostSell->name }}">
                                </div>
                                <div class="grid-img">
                                    <img src="{{ asset('images/products/'.$mostSell->photo) }}" class="img-responsive" alt="{{ $mostSell->name }}">
                                </div>
                            </a>
                        </figure>
                    </div>
                    @if($mostSell->quantity == 0)
                        <div class="ribben1">
                            <p>Sin Stock</p>
                        </div>
                    @endif
                    <div class="women">
                        <h6><a href="{{ url('producto', $mostSell->slug) }}">{{ str_limit($mostSell->name, 21) }}</a></h6>
                        <div class="block star-rating" style="margin-left: 38%;">
                            <div class="back-stars small ghosting">
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>

                                <div class="front-stars" style="width: {{$mostSell->rating}}%">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <br>
                        <span class="size">Precio:</span>
                        @if($mostSell->offer)
                            <h5>
                                <del>${{ $mostSell->price }}</del>
                            </h5>
                            <h4 class="item_price">${{ $mostSell->offer }}</h4>
                        @else
                            <p><em class="item_price">${{ $mostSell->price }}</em></p>
                        @endif
                        <br>
                        <a href="{{ url('producto', $mostSell->slug) }}" class="my-cart-b item_add">Ver Más</a>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="clearfix"></div>
        </div>
    </div>
</div>
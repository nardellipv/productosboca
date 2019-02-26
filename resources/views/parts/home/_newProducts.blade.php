<div class="new-arrivals-w3agile">
    <div class="container">
        <h2 class="tittle">Nuevos Productos</h2>
        <div class="arrivals-grids">
            @foreach($newProducts as $newProduct)
                <div class="col-md-3 arrival-grid simpleCart_shelfItem">
                    <div class="grid-arr">
                        <div class="grid-arrival">
                            <figure>
                                <a href="{{ url('producto', $newProduct->slug) }}" class="new-gri">
                                    <div class="grid-img">
                                        <img src="{{ $newProduct->photo }}" class="img-responsive" alt="">
                                    </div>
                                    <div class="grid-img">
                                        <img src="{{ $newProduct->photo }}" class="img-responsive" alt="">
                                    </div>
                                </a>
                            </figure>
                        </div>
                        <div class="women">
                            <h6><a href="{{ url('producto', $newProduct->slug) }}">{{ $newProduct->name }}</a></h6>
                            <div class="block star-rating" style="margin-left: 38%;">
                                <div class="back-stars small ghosting">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>

                                    <div class="front-stars" style="width: {{$newProduct->rating}}%">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                            <span class="size">Precio: </span>
                            @if($newProduct->offer)
                                <h5>
                                    <del>${{ $newProduct->price }}</del>
                                </h5>
                                <h4 class="item_price">${{ $newProduct->offer }}</h4>
                            @else
                                <p><em class="item_price">${{ $newProduct->offer }}</em></p>
                            @endif
                            <br>
                            <a href="{{ url('producto', $newProduct->slug) }}" class="my-cart-b item_add">Ver Más</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="clearfix"></div>
        </div>
    </div>
</div>
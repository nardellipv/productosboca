@foreach($newProducts as $newProduct)
    <div class="col-lg-3 col-md-6">
        <div class="single-product">
            <img class="img-fluid" src="{{ asset('images/products/'.$newProduct->photo) }}" alt="{{$newProduct->name}}">
            @if($newProduct->quantity == 0)
                <b>Sin Stock</b>
            @endif
            <div class="product-details">
                <h6><a href="{{ url('producto', $newProduct->slug) }}">{{ str_limit($newProduct->name, 21) }}</a></h6>
                <div class="price">
                    @if($newProduct->offer)
                        <h6>${{ $newProduct->offer }}</h6>
                        <h6 class="l-through">${{ $newProduct->price }}</h6>
                    @else
                        <h6>${{ $newProduct->price }}</h6>
                    @endif
                </div>
                <div class="prd-bottom">
                    <a href="{{ url('producto', $newProduct->slug) }}" class="social-info">
                        <span class="ti-bag"></span>
                        <p class="hover-text">Ver</p>
                    </a>

                    <a href="{{ url('categoria', $newProduct->category->slug) }}" class="social-info">
                        <span class="lnr lnr-move"></span>
                        <p class="hover-text">Ver Más</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach
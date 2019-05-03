@foreach($newProducts as $newProduct)
    <div class="col-lg-3 col-md-6">
        <div class="single-product">
            <img class="img-fluid" src="{{ asset('images/products/'.$newProduct->photo) }}" alt="">
            <div class="product-details">
                <h6>{{ str_limit($newProduct->name, 21) }}</h6>
                <div class="price">
                    @if($newProduct->offer)
                        <h6>${{ $newProduct->offer }}</h6>
                        <h6 class="l-through">${{ $newProduct->price }}</h6>
                    @else
                        <h6>${{ $newProduct->price }}</h6>
                    @endif
                </div>
                <div class="prd-bottom">

                    <a href="" class="social-info">
                        <span class="ti-bag"></span>
                        <p class="hover-text">Ver</p>
                    </a>
                    <a href="" class="social-info">
                        <span class="lnr lnr-heart"></span>
                        <p class="hover-text">Favorito</p>
                    </a>
                    <a href="" class="social-info">
                        <span class="lnr lnr-move"></span>
                        <p class="hover-text">Ver Más</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endforeach
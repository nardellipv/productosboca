<section class="exclusive-deal-area">
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-6 no-padding exclusive-left">
                <div class="row clock_sec clockdiv" id="clockdiv">
                    <div class="col-lg-12">
                        <img class="img-fluid" src="{{ asset('images/products/'.$expensive->photo) }}" alt="{{$expensive->name}}">
                    </div>
                </div>
                <a href="{{ url('producto', $expensive->slug) }}" class="primary-btn">Comprar Ahora</a>
            </div>
            <div class="col-lg-6 no-padding exclusive-right">
                <div class="active-exclusive-product-slider">
                    @foreach($offers as $offer)
                        <div class="single-exclusive-slider">
                            <img class="img-fluid" src="{{ asset('images/products/'.$offer->photo) }}" alt="{{$offer->name}}">
                            <div class="product-details">
                                <div class="price">
                                    @if($offer->offer)
                                        <h6>${{ $offer->offer }}</h6>
                                        <h6 class="l-through">${{ $offer->price }}</h6>
                                    @else
                                        <h6>${{ $offer->price }}</h6>
                                    @endif
                                </div>
                                <h4>{{ $offer->name }}</h4>
                                <div class="add-bag d-flex align-items-center justify-content-center">
                                    <a class="add-btn" href="{{ url('producto', $offer->slug) }}"><span class="ti-bag"></span></a>
                                    <span class="add-text text-uppercase">Ir al producto</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
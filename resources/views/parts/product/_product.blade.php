@extends('layouts.app')

@section('script')
    <script src="{{asset('styleWeb/js/simpleCart.min.js') }}"></script>
    <script defer src="{{asset('styleWeb/js/jquery.flexslider.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('styleWeb/css/flexslider.css') }}" media="screen"/>
    <script src="{{asset('styleWeb/js/imagezoom.js') }}"></script>
    @include('external.getsiteControl')
    <script>
        // Can also be used with $(document).ready()
        $(window).load(function () {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });
    </script>

    <style>
        .btn span.glyphicon {
            opacity: 0;
        }

        .btn.active span.glyphicon {
            opacity: 1;
        }

        .acidjs-rating-stars,
        .acidjs-rating-stars label::before {
            display: inline-block;
        }

        .acidjs-rating-stars label:hover,
        .acidjs-rating-stars label:hover ~ label {
            color: #189800;
        }

        .acidjs-rating-stars * {
            margin: 0;
            padding: 0;
        }

        .acidjs-rating-stars input {
            display: none;
        }

        .acidjs-rating-stars {
            unicode-bidi: bidi-override;
            direction: rtl;
        }

        .acidjs-rating-stars label {
            color: #ccc;
        }

        .acidjs-rating-stars label::before {
            content: "\2605";
            width: 18px;
            line-height: 18px;
            text-align: center;
            font-size: 18px;
            cursor: pointer;
        }

        .acidjs-rating-stars input:checked ~ label {
            color: #f5b301;
        }
    </style>
@endsection
<script>
    const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;

    let countDown = new Date("{{ Date::parse($product->time_offer)->format('F j, Y') }}").getTime(),
        x = setInterval(function () {

            let now = new Date().getTime(),
                distance = countDown - now;

            document.getElementById('days').innerText = Math.floor(distance / (day)),
                document.getElementById('hours').innerText = Math.floor((distance % (day)) / (hour)),
                document.getElementById('minutes').innerText = Math.floor((distance % (hour)) / (minute)),
                document.getElementById('seconds').innerText = Math.floor((distance % (minute)) / second);

            //do something later when date is reached
            //if (distance < 0) {
            //  clearInterval(x);
            //  'IT'S MY BIRTHDAY!;
            //}

        }, second)
</script>
@section('content')
    <div class="content">
        <div class="cart-items">
            <div class="container">
                <div class="single-grids">
                    <div class="col-md-9 single-grid">
                        @include('layouts.alerts.success')
                        @include('layouts.alerts.error')
                        <div class="single-top">
                            <div class="single-left">
                                <div class="flexslider">
                                    <ul class="slides">
                                        @foreach($pictures as $picture)
                                            <li data-thumb="{{ asset('images/products/'.$picture->url) }}">
                                                <div class="thumb-image"><img
                                                            src="{{ asset('images/products/'.$picture->url) }}"
                                                            data-imagezoom="true"
                                                            class="img-responsive">
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="single-right simpleCart_shelfItem">
                                <h4>{{ $product->name }}</h4>
                                <div class="block star-rating">
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
                                <br>

                                @if($product->offer)
                                    <h3>
                                        <del>${{ $product->price }}</del>
                                    </h3>
                                    <p class="price item_price">${{ $product->offer }}</p>
                                @else
                                    <p class="price item_price">${{ $product->price }}</p>
                                @endif

                                <div class="description">
                                    <p><span>Descripción : </span> {{ $product->description }}</p>
                                </div>
                                <br><br>
                                @if($product->time_offer)
                                    <div class="description">
                                        <h4>La oferta termina en:</h4>
                                        <ul style="font-size: 2em;">
                                            <li style="display: inline-block;"><span id="days"></span> Días</li>
                                            <li style="display: inline-block;"><span id="hours"></span> Hs</li>
                                            <li style="display: inline-block;"><span id="minutes"></span> Min</li>
                                            <li style="display: inline-block;"><span id="seconds"></span> Seg</li>
                                        </ul>
                                    </div>
                                @endif

                                {!! Form::open(['method' => 'POST','url' => ['/carrito/agregar', $product->id],'style'=>'display:inline']) !!}
                                {{ csrf_field() }}
                                <div class="color-quality">
                                    <h6>Cantidad :</h6>
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <input type="number" min="1" max="20" class="entry value1" name="quantity"
                                                   style="width: 15%;" placeholder="1" value="1">
                                        </div>
                                    </div>
                                </div>

                                <div class="color-quality">
                                    <div class="btn-group" data-toggle="buttons">
                                        <h6>Talle:</h6>
                                        @foreach($sizes as $size)
                                            <label class="btn btn-link">
                                                <label>{{ $size->size->size }}</label>
                                                <input type="radio" name="size" id="option2"
                                                       value="{{ $size->size->size }}" autocomplete="off" required>
                                                <span class="glyphicon glyphicon-ok"></span>
                                            </label>
                                        @endforeach
                                    </div>
                                    <br><br>
                                    @if($product->quantity == 0)
                                        <a href="#" class="button1"> Sin Stock</a>
                                    @else
                                        <button type="submit" class="my-cart-b item_add">Agregar al
                                            carrito
                                        </button>
                                    @endif
                                </div>
                                {!! Form::close() !!}
                                <br>

                                {!! Form::open(['method' => 'POST','route' => ['calcular', $product->slug],'style'=>'display:inline']) !!}
                                {{ csrf_field() }}
                                <div class="color-quality">
                                    <h6>Calcular Envio :</h6>
                                    <div class="quantity">
                                        <div class="quantity-select">
                                            <input type="number" class="entry value1" style="width: 30%;" name="envio"
                                                   placeholder="Código Postal">
                                            <button type="submit" class="my-cart-b item_add">Calcular</button>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::Close() !!}

                                @if($tarifa > 0)
                                    <p class="well">El costo de envio es de aprox.: $ {{ $tarifa }}</p>
                                @elseif($tarifa == -1)
                                    <p class="well">Error en el código postal <a
                                                href="https://www.andreani.com/buscador-de-codigos-postales"
                                                target="_blank">Consulte
                                            aquí</a></p>
                                @endif
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    @include('parts.product._aside')
                    <div class="clearfix"></div>

                    <div class="product-w3agile">
                        <div class="product-grids">
                            <div class="col-md-8 product-grid1">
                                <div class="tab-wl3">
                                    <div class="bs-example bs-example-tabs" role="tabpanel"
                                         data-example-id="togglable-tabs">
                                        <ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" id="home-tab"
                                                                                      role="tab"
                                                                                      data-toggle="tab"
                                                                                      aria-controls="home"
                                                                                      aria-expanded="true"><img
                                                            src="{{ asset('styleWeb/img/icons/circle.png') }}"> </a>
                                            </li>
                                            <li role="presentation"><a href="#reviews" role="tab" id="reviews-tab"
                                                                       data-toggle="tab" aria-controls="reviews">Reviews
                                                </a></li>

                                        </ul>
                                        <div id="myTabContent" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home"
                                                 aria-labelledby="home-tab">

                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="reviews"
                                                 aria-labelledby="reviews-tab">
                                                <div class="descr">
                                                    <div class="reviews-top">
                                                        @foreach($reviews as $review)
                                                            <div class="reviews-right">
                                                                <ul>
                                                                    <li><a href="#">{{ $review->user->name }}</a></li>
                                                                </ul>
                                                                <p>{{ $review->review }}</p>
                                                            </div>
                                                        @endforeach
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    @if (Auth::check())
                                                        {!! Form::open(['method' => 'POST','route' => ['rating', $product->id],'style'=>'display:inline']) !!}
                                                        {{ csrf_field() }}
                                                        @if(!$userReview)
                                                            <div class="reviews-bottom">
                                                                <h4>Agregar Reviews</h4>
                                                                <p>Tu email nunca será publicado. Solo publicaremos tu
                                                                    nombre de pila. *</p>
                                                                <p>Tu Rating sobre el producto</p>
                                                                <div class="acidjs-rating-stars">
                                                                    <input type="radio" name="rating" id="group-1-0"
                                                                           value="100" required/><label
                                                                            for="group-1-0"></label>
                                                                    <input type="radio" name="rating" id="group-1-1"
                                                                           value="80"/><label for="group-1-1"></label>
                                                                    <input type="radio" name="rating" id="group-1-2"
                                                                           value="60"/><label for="group-1-2"></label>
                                                                    <input type="radio" name="rating" id="group-1-3"
                                                                           value="40"/><label for="group-1-3"></label>
                                                                    <input type="radio" name="rating" id="group-1-4"
                                                                           value="20"/><label for="group-1-4"></label>
                                                                </div>
                                                                <br><br>
                                                                <textarea type="text" Name="review"
                                                                          placeholder="Mensaje..."
                                                                          required=""></textarea>
                                                                <input type="submit" value="Enviar">
                                                                <br>
                                                            </div>
                                                        @endif
                                                        {!! Form::Close() !!}
                                                        <br><br>
                                                    @else
                                                        <div class="descr">
                                                            <div class="reviews-bottom">
                                                                <form method="POST" action="{{ route('login') }}">
                                                                    @csrf
                                                                    <label>Debes ingresar para dejar tu
                                                                        review </label> <a href=""
                                                                                           class="btn btn-primary">Crear
                                                                        Cuenta</a>

                                                                    <div class="row">
                                                                        <div class="col-md-6 row-grid">
                                                                            <label>Email</label>
                                                                            <input type="email" value="Email"
                                                                                   class="{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                                                   Name="email"
                                                                                   onfocus="this.value = '';"
                                                                                   onblur="if (this.value == '') {this.value = 'Email';}"
                                                                                   required="">
                                                                        </div>
                                                                        @if ($errors->has('email'))
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('email') }}</strong>
                                                                            </span>
                                                                        @endif

                                                                        <div class="col-md-6 row-grid">
                                                                            <label>Password</label>
                                                                            <input type="password" value="password"
                                                                                   class="{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                                                   Name="password"
                                                                                   onfocus="this.value = '';"
                                                                                   onblur="if (this.value == '') {this.value = 'Password';}"
                                                                                   required="">
                                                                            @if ($errors->has('password'))
                                                                                <span class="invalid-feedback"
                                                                                      role="alert">
                                                                                    <strong>{{ $errors->first('password') }}</strong>
                                                                                </span>
                                                                            @endif
                                                                        </div>
                                                                        <div class="clearfix"></div>
                                                                    </div>
                                                                    <input type="submit" value="Ingresar"> <a
                                                                            href="{{ route('password.request') }}">
                                                                        Olvide mi Password</a>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <br><br>
                                                    @endif
                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="custom"
                                                 aria-labelledby="custom-tab">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="new-arrivals-w3agile">
                <div class="container">
                    <h3 class="tittle1">Productos Relacionados</h3>
                    <div class="arrivals-grids">
                        @foreach($relateds as $related)
                            <div class="col-md-3 arrival-grid simpleCart_shelfItem">
                                <div class="grid-arr">
                                    <div class="grid-arrival">
                                        <figure>
                                            <a href="{{ url('producto', $related->slug) }}">
                                                <div class="grid-img">
                                                    <img src="{{ asset('images/products/'.$related->photo) }}"
                                                         class="img-responsive" alt="">
                                                </div>
                                                <div class="grid-img">
                                                    <img src="{{ asset('images/products/'.$related->photo) }}"
                                                         class="img-responsive" alt="">
                                                </div>
                                            </a>
                                        </figure>
                                    </div>
                                    <div class="women">
                                        <h6><a href="{{ url('producto', $related->slug) }}">{{ $related->name }}</a>
                                        </h6>

                                        <div class="block star-rating" style="margin-left: 38%;">
                                            <div class="back-stars small ghosting">
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i>

                                                <div class="front-stars" style="width: {{$related->rating}}%">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        @if($product->offer)
                                            <h5>
                                                <del>${{ $product->price }}</del>
                                            </h5>
                                            <h4 class="item_price">${{ $product->offer }}</h4>
                                        @else
                                            <p><em class="item_price">${{ $product->price }}</em></p>
                                        @endif
                                        <br>
                                        <a href="{{ url('producto', $product->slug) }}" class="my-cart-b item_add">Ver
                                            Más</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
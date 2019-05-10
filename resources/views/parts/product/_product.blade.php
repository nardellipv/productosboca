@extends('layouts.app')

@section('title', $product->name)

@section('content')
    @include('layouts.alerts.success')
    @include('layouts.alerts.error')
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="s_Product_carousel">
                        @foreach($pictures as $picture)
                            <div class="single-prd-item">
                                <img class="img-fluid" src="{{ asset('images/products/'.$picture->url) }}" alt="{{$picture->name}}">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>{{ $product->name }}</h3>
                        @if($product->offer)
                            <h2>${{ $product->offer }}</h2>
                            <del><h2 class="l-through">${{ $product->price }}</h2></del>
                        @else
                            <h2>${{ $product->price }}</h2>
                        @endif
                        <ul class="list">
                            <li><a class="active" href="#"><span>Categoría</span> : {{ $product->category->name }}</a>
                            </li>
                            @if($product->quantity == 0)
                                <li><a href="#"><span>Disponibilidad</span> : Sin Stock</a></li>
                            @else
                                <li><a href="#"><span>Disponibilidad</span> : En Stock</a></li>
                            @endif
                        </ul>
                        <p>{{ $product->description }}</p>

                        {!! Form::open(['method' => 'POST','url' => ['/carrito/agregar', $product->id],'style'=>'display:inline']) !!}
                        {{ csrf_field() }}
                        <div class="row">
                            @if(count($sizes) > 1)
                                <div class="col-md-3">
                                    <select name="size">
                                        <option value="">Talla:</option>
                                        <option value="">---------------------</option>
                                        @foreach($sizes as $size)
                                            <option value="{{ $size->size->size }}">{{ $size->size->size }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <div class="col-md-4">
                                <select name="quantity">
                                    <option value="">Cantidad:</option>
                                    <option value="">--------------------</option>
                                    <option value="1">1</option>
                                    <option value="1">2</option>
                                    <option value="1">3</option>
                                    <option value="1">4</option>
                                    <option value="1">5</option>
                                    <option value="1">6</option>
                                </select>
                            </div>
                        </div>
                        <br><br>
                        <div class="card_area d-flex align-items-center">
                            @if($product->quantity == 0)
                                <a href="#" class="primary-btn disabled">Agregar</a href="#">
                            @else
                                <button class="primary-btn">Agregar</button>
                            @endif
                        </div>
                        {!! Form::Close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="product_description_area">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                       aria-controls="contact"
                       aria-selected="false">Comentarios
                        <span> {{ $countReview > 0 ? '('.$countReview .')' : '(0)' }} </span></a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="comment_list">
                                @if($countReview == 0)
                                    <p>Se el primero en comentar el producto</p>
                                @else
                                    @foreach($reviews as $review)
                                        <div class="review_item">
                                            <div class="media">
                                                <div class="media-body">
                                                    <h4>{{ $review->user->name }}</h4>
                                                    <h5>{{ Date::parse($review->created_at)->format('j-m-Y H:m') }}
                                                        Hs.</h5>
                                                </div>
                                            </div>
                                            <p>{{ $review->review }}</p>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="review_box">
                                <h4>Comenta el producto</h4>
                                @if (Auth::check())
                                    <form class="row contact_form" action="contact_process.php" method="post"
                                          id="contactForm" novalidate="novalidate">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="name" name="name"
                                                       value="{{ Auth::user()->name }}" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control" id="lastname" name="lastname"
                                                       value="{{ Auth::user()->lastname }}" disabled>
                                                <small>Tu apellido no será publicado</small>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="email" class="form-control" id="email" name="email"
                                                       value="{{ Auth::user()->email }}" disabled>
                                                <small>Tu email no será publicado</small>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                            <textarea class="form-control" name="message" id="message" rows="1"
                                                      placeholder="Mensaje"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-right">
                                            <button type="submit" value="submit" class="btn primary-btn">Enviar
                                                Comentario
                                            </button>
                                        </div>
                                    </form>
                                @else
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <label>Debes ingresar para dejar tu
                                            comentario </label> <a href="{{ url('register') }}"
                                                                   class="genric-btn danger circle arrow">Crear
                                            Cuenta<span class="lnr lnr-arrow-right"></span></a>
                                        <br><br>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mt-10">
                                                    <input type="email" value="Email"
                                                           class="single-input{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                                           Name="email"
                                                           onfocus="this.value = '';"
                                                           onblur="if (this.value == '') {this.value = 'Email';}"
                                                           onfocus="this.placeholder = ''"
                                                           onblur="this.placeholder = 'email'"
                                                           required>
                                                </div>
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $errors->first('email') }}</strong>
                                                                            </span>
                                                @endif
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mt-10">
                                                    <input type="password" value="password"
                                                           class="single-input{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                           Name="password"
                                                           onfocus="this.value = '';"
                                                           onblur="if (this.value == '') {this.value = 'Password';}"
                                                           onfocus="this.placeholder = ''"
                                                           onblur="this.placeholder = 'password'">
                                                </div>
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback"
                                                          role="alert">
                                                                                    <strong>{{ $errors->first('password') }}</strong>
                                                                                </span>
                                                @endif
                                            </div>
                                            <br><br><br>
                                            <div class="offset-2">
                                                <button type="submit" class="genric-btn primary">Ingresar</button>
                                                <a href="{{ route('password.request') }}" class="genric-btn danger">Olvide
                                                    mi contraseña</a>
                                            </div>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="related-product-area section_gap_bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="section-title">
                        <h1>Productos Relacionados</h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">
                        @foreach($relateds as $related)
                            <div class="col-lg-4 col-md-4 col-sm-6 mb-20">
                                <div class="single-related-product d-flex">
                                    <a href="{{ url('producto', $related->slug) }}"><img
                                                src="{{ asset('images/products/'.$related->photo) }}"
                                                alt="{{ $related->name }}" width="100%"></a>
                                    @if($related->quantity == 0)
                                        <b>Sin Stock</b>
                                    @endif
                                    <div class="desc">
                                        <a href="{{ url('producto', $related->slug) }}"
                                           class="title">{{ $related->name }}</a>
                                        <div class="price">
                                            @if($related->offer)
                                                <h6>${{ $related->offer }}</h6>
                                                <h6 class="l-through">${{ $related->price }}</h6>
                                            @else
                                                <h6>${{ $related->price }}</h6>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ctg-right">
                        <a href="#" target="_blank">
                            <img class="img-fluid d-block mx-auto" src="{{ asset('styleWeb/img/category/c5.jpg') }}"
                                 alt="{{$related->name}}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

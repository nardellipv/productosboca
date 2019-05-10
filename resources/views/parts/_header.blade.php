@if(Request::is('/'))
    <section class="banner-area">
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-start">
                <div class="col-lg-12">
                    <div class="active-banner-slider owl-carousel">
                        <!-- single-slide -->
                        <div class="row single-slide align-items-center d-flex">
                            <div class="col-lg-5 col-md-6">
                                <div class="banner-content">
                                    <h1>Indumentaria Boca Juniors <br>2018/2019!</h1>
                                    <p>En Boca América, tienda online, nos dedicamos solamente a la indumentaria del
                                        Xeneize. En el sitio encontras
                                        remeras, camisetas, camperas y ropa personalizada del club más grande de
                                        Argentina,
                                        tanto para hombres, mujeres y niños.</p>

                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="banner-img">
                                    <img class="img-fluid" src="{{ asset('styleWeb/img/banner/benedetto.png') }}"
                                         alt="">
                                </div>
                            </div>
                        </div>
                        <!-- single-slide -->
                        <div class="row single-slide">
                            <div class="col-lg-5">
                                <div class="banner-content">
                                    <h1>Envíos <br> Gratis!</h1>
                                    <p>Superando los <b>${{ $costoEnvio }}</b> en productos de Boca, el envío es totalmente gratis a cualquier parte de país.</p>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="banner-img">
                                    <img class="img-fluid" src="{{ asset('styleWeb/img/banner/camiseta.png') }}"
                                         alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="features-area section_gap">
        <div class="container">
            <div class="row features-inner">
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('styleWeb/img/features/f-icon1.png') }}" alt="Envios Boca Juniors">
                        </div>
                        <h6>Envíos</h6>
                        <p>Envíos a todo el país.</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('styleWeb/img/features/payment.png') }}" alt="Medios de pagos">
                        </div>
                        <h6>Medios de pagos</h6>
                        <p>Plataformas MercadoPago y PayU.</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('styleWeb/img/features/f-icon3.png') }}" alt="Soporte">
                        </div>
                        <h6>24/7 Soporte</h6>
                        <p>Soporte por mail, chat y teléfono.</p>
                    </div>
                </div>
                <!-- single features -->
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-features">
                        <div class="f-icon">
                            <img src="{{ asset('styleWeb/img/features/security.png') }}" alt="Seguridad pagos">
                        </div>
                        <h6>Pagos Seguros</h6>
                        <p>Pogos por plataformas seguras.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
@if(Request::is('categoria/*'))
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1 style="color: blue">{{ $category->name }}</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ url('/') }}" style="color: blue">Incio<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#" style="color: blue">Categoría<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#" style="color: blue">{{ $category->name }}</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endif
@if(Request::is('producto/*'))
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1 style="color: blue">{{ $product->name }}</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ url('/') }}" style="color: blue">Incio<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#" style="color: blue">Categoría<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#" style="color: blue">{{ $product->category->name }}</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endif
@if(Request::is('login'))
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1 style="color: blue">Ingresar</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ url('/') }}" style="color: blue">Incio<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#" style="color: blue">Ingresar</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endif
@if(Request::is('register'))
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1 style="color: blue">Nuevo Usuario</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ url('/') }}" style="color: blue">Incio<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#" style="color: blue">Registro</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endif
@if(Request::is('perfil'))
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1 style="color: blue">Hola {{ Auth::user()->name }}</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ url('/') }}" style="color: blue">Incio</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endif
@if(Request::is('mail/contacto'))
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1 style="color: blue">Contacto</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ url('/') }}" style="color: blue">Incio<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#" style="color: blue">Contacto</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endif
@if(Request::is('carrito') OR Request::is('carrito/*'))
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1 style="color: blue">Carrito</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ url('/') }}" style="color: blue">Incio<span class="lnr lnr-arrow-right"></span></a>
                        <a href="#" style="color: blue">Carrito</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endif
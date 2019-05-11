<div class="main_menu">
    <nav class="navbar navbar-expand-lg navbar-light main_box">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="{{ url('/') }}"><img src="{{ asset('styleWeb/img/logochico.png') }}"
                                                                      alt="boca juniors"></a>
            @if($countCart)
                <a href="{{ url('carrito') }}" class="genric-btn primary small">Ir al carrito ({{$countCart}})</a>
            @endif
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                <ul class="nav navbar-nav menu_nav ml-auto">
                    <li class="nav-item active"><a class="nav-link" href="{{ url('/') }}">Inicio</a></li>
                    @if(Auth::check())
                        <li class="nav-item"><a class="nav-link" href="{{ url('perfil') }}"
                                                style="color: blue;">Perfil {{ Auth::user()->name}}</a></li>
                    @else
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true"
                               aria-expanded="false">Mi Cuenta</a>
                            <ul class="dropdown-menu">
                                <li class="nav-item"><a class="nav-link" href="{{ url('login') }}">Ingresar</a></li>
                                <li class="nav-item"><a class="nav-link" href="{{ url('register') }}">Registrarme</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                    <li class="nav-item submenu dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-haspopup="true"
                           aria-expanded="false">Ayuda</a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a class="nav-link" href="{{ route('envios') }}">Envíos</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('payments') }}">Formas de Pago</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('termns') }}"
                                                    style="font-size: x-small;">Términos y Condiciones</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ route('policity') }}"
                                                    style="font-size: x-small;">Política de Privacidad</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('/mail/contacto') }}">Contacto</a></li>
                    @if(Auth::check())
                        <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}" style="color: red;"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">Salir</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">

                                @csrf

                            </form>
                        </li>
                    @endif
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if($countCart)
                        <li class="nav-item"><a href="{{ url('carrito') }}" class="cart"><span
                                        class="ti-bag" style="color: red;font-size: 21px;"></span> $ {{$totalCart}}
                                ({{$countCart}})</a></li>
                    @else
                        <li class="nav-item"><a href="{{ url('carrito') }}" class="cart"><span
                                        class="ti-bag"></span></a></li>
                    @endif
                    {{--<li class="nav-item">
                        <button class="search"><span class="lnr lnr-magnifier" id="search"></span></button>
                    </li>--}}
                </ul>
            </div>
        </div>
    </nav>
</div>

{{--
<div class="search_input" id="search_input_box">
    <div class="container">
        <form class="d-flex justify-content-between">
            <input type="text" class="form-control" id="search_input" placeholder="Search Here">
            <button type="submit" class="btn"></button>
            <span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
        </form>
    </div>
</div>--}}

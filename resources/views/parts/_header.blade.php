<div class="header-top">
    <div class="container">
        <div class="top-left">
            {{--<a href="#"> Whatsapp  <i class="glyphicon glyphicon-phone" aria-hidden="true"></i> +0123-456-789</a>--}}
        </div>
        <div class="top-right">
            <ul>
                @if (Auth::check())
                    <li>Bienvenido {{ Auth::user()->name }}</li>
                @endif
                <li><a href="{{ url('carrito') }}">Checkout</a></li>
                @if (Auth::check())
                    <li><a href="login.html">Perfíl</a></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
               document.getElementById('logout-form').submit();"> Salir </a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @else
                    <li><a href="{{ url('login') }}">Ingresar</a></li>
                    <li><a href="{{ url('register') }}"> Crear Cuenta </a></li>
                @endif
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
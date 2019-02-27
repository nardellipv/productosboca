<div class="header-top">
    <div class="container">
        <div class="top-left">
            <h5>Compras superiores a <b>${{ $costoEnvio }}</b> envio <b>sin cargo</b></h5>
        </div>
        <div class="top-right">
            <ul>
                @if (Auth::check())
                    <li>Bienvenido {{ Auth::user()->name }}</li>
                @endif
                <li><a href="{{ url('carrito') }}">Checkout</a></li>
                @if (Auth::check())
                    <li><a href="{{ url('perfil') }}">Perfíl</a></li>
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
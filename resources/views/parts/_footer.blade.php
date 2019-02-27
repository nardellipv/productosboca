<div class="footer-w3l">
    <div class="container">
        <div class="footer-grids">
            <div class="col-md-3 footer-grid">
                <h4>Sobre Nosotros </h4>
                <p>Somos una nueva empresa de venta online exclusiva en productos del Club Atlético Boca Juniors.</p>
                <div class="social-icon">
                    <a href="https://www.facebook.com/BocaAmerica-253540472242495" target="_blank"><img src="{{ asset('styleWeb/img/icons/facebook.png') }}"></a>
                    <a href="https://www.instagram.com/bocaamerica/" target="_blank"><img src="{{ asset('styleWeb/img/icons/instagram.png') }}"></a>
                    <a href="https://www.youtube.com/channel/UClHxXyRZoW_pXubLEUAI15Q" target="_blank"><img src="{{ asset('styleWeb/img/icons/youtube.png') }}"></a>
                </div>
            </div>
            <div class="col-md-3 footer-grid">
                <h4>Mi Cuenta</h4>
                <ul>
                    <li><a href="{{ url('carrito') }}">Checkout</a></li>
                    <li><a href="{{ url('login') }}">Login</a></li>
                    <li><a href="{{ url('register') }}"> Crear Cuenta </a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-grid">
                <h4>Información</h4>
                <ul>
                    <li><a href="{{ route('envios') }}">Envios</a></li>
                    <li><a href="{{ route('payments') }}">Formas de pago</a></li>
                    {{--<li><a href="{{ route('buy') }}">Como Comprar</a></li>--}}
                    <li><a href="{{ route('termns') }}">Términos y condiciones</a></li>
                    <li><a href="{{ route('policity') }}">Políticas de privacidad</a></li>
                </ul>
            </div>
            <div class="col-md-3 footer-grid foot">
                <h4>Contacto</h4>
                <ul>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a
                                href="mailto:info@bocaamerica.com"> info@bocaamerica.com</a></li>

                </ul>
            </div>
            <div class="clearfix"></div>
        </div>

    </div>
</div>
<div class="copy-section">
    <div class="container">
        <div class="copy-left">
            <p>&copy; 2019 Boca América . All rights reserved | Design by <a href="https://mikant.com" target="_blank">MikAnt</a></p>
        </div>
        <div class="copy-right">
            <img src="{{ asset('styleWeb/img/mediospagos/mpchica.png') }}" alt="medios de pagos">
            <img src="{{ asset('styleWeb/img/mediospagos/payuchica.png') }}" alt="medios de pagos">
        </div>
        <div class="clearfix"></div>
    </div>
</div>
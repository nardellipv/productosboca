<footer class="footer-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-3  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Sobre Nosotros</h6>
                    <p>
                        Somos una tienda online con productos e indumentaria solo de Club Atético Boca Juniors.
                    </p>
                </div>
            </div>
            <div class="col-lg-4  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Información Importante</h6>
                    <ul>
                        <li><a href="{{ route('envios') }}">Envios</a></li>
                        <li><a href="{{ route('payments') }}">Formas de pago</a></li>
                        {{--<li><a href="{{ route('buy') }}">Como Comprar</a></li>--}}
                        <li><a href="{{ route('termns') }}">Términos y Condiciones</a></li>
                        <li><a href="{{ route('policity') }}">Política de Privacidad</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3  col-md-6 col-sm-6">
                <div class="single-footer-widget mail-chimp">
                    <h6 class="mb-20">Mi Cuenta</h6>
                    <ul>
                        <li><a href="{{ url('carrito') }}">Checkout</a></li>
                        <li><a href="{{ url('login') }}">Login</a></li>
                        <li><a href="{{ url('register') }}"> Crear Cuenta </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6>Nuestras Redes</h6>
                    <div class="footer-social d-flex align-items-center">
                        <a href="https://www.facebook.com/bocaamericaOK/" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="https://twitter.com/bocaamericaOK" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="https://www.instagram.com/bocaamerica" target="_blank"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
            <p class="footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Sitio desarrollado con <i class="fa fa-heart-o" aria-hidden="true"></i> por <a href="#" target="_blank">denarMA</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
        </div>
    </div>
</footer>
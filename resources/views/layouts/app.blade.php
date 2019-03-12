<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Boca América @yield('title')</title>
    <!--css-->
    <link href="{{asset('styleWeb/css/bootstrap.css') }}" rel="stylesheet" media="all"/>
    <link href="{{asset('styleWeb/css/style.css') }}" rel="stylesheet" media="all"/>
    <link href="{{asset('styleWeb/css/font-awesome.css') }}" rel="stylesheet">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('styleWeb/favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{asset('styleWeb/favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('styleWeb/favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('styleWeb/favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('styleWeb/favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('styleWeb/favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('styleWeb/favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('styleWeb/favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('styleWeb/favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('styleWeb/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('styleWeb/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{asset('styleWeb/favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('styleWeb/favicon/favicon-16x16.png') }}">

    <meta property="og:url" content="https://bocaamerica.com"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="Productos de Boca Juniors, todos en un solo lugar."/>
    <meta property="og:description" content="Encontra productos de Boca Juniors en un solo lugar y al mejor precio."/>
    <meta property="og:image" content="https://bocaamerica.com/styleWeb/img/logochico.png"/>

    <!--css-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="description" content="Tienda exclusiva de productos de Boca Juniors. Envios a todo el país y excelentes descuentos.
                    Venta de remeras, pantalones, merchandising, camisetas y mucho más"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <script src="{{asset('styleWeb/js/jquery.min.js') }}"></script>
    <link href='//fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="{{ asset('styleWeb/css/star.css') }}" media="screen"/>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300'
          rel='stylesheet' type='text/css'>
    <!--search jQuery-->
    <script src="{{asset('styleWeb/js/main.js') }}"></script>
    <!--search jQuery-->
    <script src="{{asset('styleWeb/js/responsiveslides.min.js') }}"></script>

    @yield('script')

    <script>
        $(function () {
            $("#slider").responsiveSlides({
                auto: true,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                pager: true,
            });
        });
    </script>
    <!--mycart-->
    <script type="text/javascript" src="{{asset('styleWeb/js/bootstrap-3.1.1.min.js') }}"></script>
    <!-- cart -->
    <script src="{{asset('styleWeb/js/simpleCart.min.js') }}"></script>
    <!-- cart -->
    <!--start-rate-->
    <script src="{{asset('styleWeb/js/jstarbox.js') }}"></script>
    <link rel="stylesheet" href="{{asset('styleWeb/css/jstarbox.css') }}" media="screen"
          charset="utf-8"/>
    <script type="text/javascript">
        jQuery(function () {
            jQuery('.starbox').each(function () {
                var starbox = jQuery(this);
                starbox.starbox({
                    average: starbox.attr('data-start-value'),
                    changeable: starbox.hasClass('unchangeable') ? false : starbox.hasClass('clickonce') ? 'once' : true,
                    ghosting: starbox.hasClass('ghosting'),
                    autoUpdateAverage: starbox.hasClass('autoupdate'),
                    buttons: starbox.hasClass('smooth') ? false : starbox.attr('data-button-count') || 5,
                    stars: starbox.attr('data-star-count') || 5
                }).bind('starbox-value-changed', function (event, value) {
                    if (starbox.hasClass('random')) {
                        var val = Math.random();
                        starbox.next().text(' ' + val);
                        return val;
                    }
                })
            });
        });
    </script>
    <!--//End-rate-->
    @include('external.analitycs')
    @include('external.pixelFace')
    @include('external.hotkey')
    @include('external._chat')

</head>
<body>
<!--header-->
<div class="header">
    @include('parts._header')
    @include('parts._menu')
    <br>
    @if($countCart > 0)
        @if (Request::path() != 'carrito')
        <a href="{{ url('carrito') }}" class="btn btn-primary col-sm-offset-5 col-sm-2 text-center">ir al carrito</a>
            @endif
    @endif
</div>

@yield('content')

@include('parts._footer')
@include('external.getsiteControl')
</body>
</html>
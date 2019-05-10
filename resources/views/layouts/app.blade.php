<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
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

    <title>Boca América @yield('title')</title>

    <meta property="og:url" content="https://bocaamerica.com"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="Productos de Boca Juniors, todos en un solo lugar."/>
    <meta property="og:description" content="Encontra productos de Boca Juniors en un solo lugar y al mejor precio."/>
    <meta property="og:image" content="https://bocaamerica.com/styleWeb/img/logochico.png"/>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="description" content="Tienda Online exclusiva de productos de Boca Juniors. Envios a todo el país y excelentes descuentos.
                    Venta de remeras, pantalones, merchandising, camisetas y mucho más"/>

    <!--
        CSS
        ============================================= -->
    <link rel="stylesheet" href="{{ asset('styleWeb/css/linearicons.css') }}">
    <link rel="stylesheet" href="{{ asset('styleWeb/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styleWeb/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('styleWeb/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('styleWeb/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('styleWeb/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('styleWeb/css/nouislider.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styleWeb/css/ion.rangeSlider.css') }}" />
    <link rel="stylesheet" href="{{ asset('styleWeb/css/ion.rangeSlider.skinFlat.css') }}" />
    <link rel="stylesheet" href="{{ asset('styleWeb/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('styleWeb/css/main.css') }}">

    @yield('style')
</head>

<body>

<!-- Start Header Area -->
<header class="header_area sticky-header">

    @include('parts._menu')

</header>
<!-- End Header Area -->

<!-- start banner Area -->
    @include('parts._header')
<!-- End banner Area -->


    @yield('content')

<!-- start footer Area -->
    @include('parts._footer')
<!-- End footer Area -->

<script src="{{ asset('styleWeb/js/vendor/jquery-2.2.4.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="{{ asset('styleWeb/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('styleWeb/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('styleWeb/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('styleWeb/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('styleWeb/js/nouislider.min.js') }}"></script>
{{--<script src="{{ asset('styleWeb/js/countdown.js') }}"></script>--}}
<script src="{{ asset('styleWeb/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('styleWeb/js/owl.carousel.min.js') }}"></script>
<!--gmaps Js-->
{{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>--}}
{{--<script src="{{ asset('styleWeb/js/gmaps.min.js') }}"></script>--}}
<script src="{{ asset('styleWeb/js/main.js') }}"></script>

@yield('script')

</body>

</html>
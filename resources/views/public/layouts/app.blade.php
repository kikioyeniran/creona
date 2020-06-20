<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- =====  BASIC PAGE NEEDS  ===== -->
        <meta charset="utf-8">
        <title>Creona</title>
        <!-- =====  SEO MATE  ===== -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="distribution" content="global">
        <meta name="revisit-after" content="2 Days">
        <meta name="robots" content="ALL">
        <meta name="rating" content="8 YEARS">
        <meta name="Language" content="en-us">
        <meta name="GOOGLEBOT" content="NOARCHIVE">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- =====  MOBILE SPECIFICATION  ===== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="viewport" content="width=device-width">
        <!-- =====  CSS  ===== -->
        <link href="{{ asset('use.fontawesome.com/releases/v5.0.8/css/all.css')}}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootsnav.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/menu.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/magnific-popup.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.css')}}">
        <link rel="shortcut icon" href="{{ asset('images/favicon.png')}}">
        <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.html')}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/apple-touch-icon-72x72.html')}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/apple-touch-icon-114x114.html')}}">
    </head>
    <body>
        <!-- =====  LOADER  ===== -->
        <div class="loder"></div>
        <div class="wrapper">
            @include('public.inc.navbar')
                @yield('content')
            @include('public.inc.footer')
        </div>

        <a id="scrollup">Scroll</a>
        <script src="{{ asset('js/jQuery_v3.1.1.min.js')}}"></script>
        <script src="{{ asset('js/owl.carousel.min.js')}}"></script>
        <script src="{{ asset('js/bootsnav.js')}}"></script>
        <script src="{{ asset('js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('js/jquery.magnific-popup.js')}}"></script>
        <script src="{{ asset('js/jquery.firstVisitPopup.js')}}"></script>
        <script src="{{ asset('js/custom.js')}}"></script>
    </body>
</html>
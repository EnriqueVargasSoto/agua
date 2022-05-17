<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Servicio de Agua</title>

    <!-- Stylesheets -->
    <link href="{{ asset('web/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{ asset('web/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('web/css/responsive.css')}}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('web/images/favicon.png')}}" type="image/x-icon">
    <link rel="icon" href="{{ asset('web/images/favicon.png')}}" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->

    @yield('style')

<body data-anm=".anm">
    
    <div class="page-wrapper">

        <!-- Preloader -->
        <div class="preloader"></div>

        @include('web.layouts.header')

        @yield('content')

        @include('web.layouts.footer')

    </div>

    <script src="{{ asset('web/js/jquery.js')}}"></script>
    <script src="{{ asset('web/js/popper.min.js')}}"></script>
    <script src="{{ asset('web/js/chosen.min.js')}}"></script>
    <script src="{{ asset('web/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('web/js/jquery.fancybox.js')}}"></script>
    <script src="{{ asset('web/js/jquery.modal.min.js')}}"></script>
    <script src="{{ asset('web/js/mmenu.polyfills.js')}}"></script>
    <script src="{{ asset('web/js/mmenu.js')}}"></script>
    <script src="{{ asset('web/js/appear.js')}}"></script>
    <script src="{{ asset('web/js/anm.min.js')}}"></script>
    <script src="{{ asset('web/js/ScrollMagic.min.js')}}"></script>
    <script src="{{ asset('web/js/rellax.min.js')}}"></script>
    <script src="{{ asset('web/js/owl.js')}}"></script>
    <script src="{{ asset('web/js/wow.js')}}"></script>
    <script src="{{ asset('web/js/script.js')}}"></script>

    @yield('script')

</body>
</html>
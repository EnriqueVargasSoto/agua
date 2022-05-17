<!DOCTYPE html>
<html lang="en">
    <!-- Mirrored from demos.creative-tim.com/argon-dashboard-pro/pages/dashboards/default.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 Mar 2022 17:18:56 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin/assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{ asset('admin/assets/img/favicon.png')}}">
    <title>Admin</title>
    <!-- Extra details for Live View on GitHub Pages -->
    <!-- Canonical SEO 
    <link rel="canonical" href="https://www.creative-tim.com/product/argon-dashboard-pro" />-->
    <!--  Social tags      
    <meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 5 dashboard, bootstrap 5, css3 dashboard, bootstrap 5 admin, Argon Dashboard bootstrap 5 dashboard, frontend, responsive bootstrap 5 dashboard, soft design, soft dashboard bootstrap 5 dashboard">
    <meta name="description" content="Argon Dashboard PRO is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">-->
    <!-- Twitter Card data 
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Argon Dashboard PRO by Creative Tim">
    <meta name="twitter:description" content="Argon Dashboard PRO is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="../../../../s3.amazonaws.com/creativetim_bucket/products/137/original/argon-dashboard-pro.jpg">-->
    <!-- Open Graph data 
    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Argon Dashboard PRO by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="landing-2.html" />
    <meta property="og:image" content="../../../../s3.amazonaws.com/creativetim_bucket/products/137/original/argon-dashboard-pro.jpg" />
    <meta property="og:description" content="Argon Dashboard PRO is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful, clean and organized. If you are looking for a tool to manage dates about your business, this dashboard is the thing for you." />
    <meta property="og:site_name" content="Creative Tim" />-->
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('admin/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="{{ asset('admin/kit.fontawesome.com/42d5adcbca.js')}}" crossorigin="anonymous"></script>
    <link href="{{ asset('admin/assets/css/nucleo-svg.css')}}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('admin/assets/css/argon-dashboard.min790f.css?v=2.0.1')}}" rel="stylesheet" />
    <!-- Anti-flicker snippet (recommended)  -->
    <style>
        .async-hide {
        opacity: 0 !important
        }
    </style>
    
</head>
<body class="g-sidenav-show   bg-gray-100">
    
    <div class="min-height-300 bg-primary position-absolute w-100"></div>

    @include('admin.layouts.menu')

    <main class="main-content position-relative border-radius-lg ">

        @include('admin.layouts.header')

        @yield('content')

    </main>


    <!--   Core JS Files   -->
    <script src="{{ asset('admin/assets/js/core/popper.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Kanban scripts -->
    <script src="{{ asset('admin/assets/js/plugins/dragula/dragula.min.js')}}"></script>
    <script src="{{ asset('admin/assets/js/plugins/jkanban/jkanban.js')}}"></script>
    {{--<script src="{{ asset('admin/assets/js/plugins/chartjs.min.js')}}"></script>--}}
    <!-- Github buttons -->
    <script async defer src="{{ asset('admin/buttons.js')}}"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('admin/assets/js/argon-dashboard.min790f.js?v=2.0.1')}}"></script>

    @yield('script')
</body>
</html>
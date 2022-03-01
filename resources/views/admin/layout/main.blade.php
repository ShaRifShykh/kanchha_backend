<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield("main-title")Kanchha Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('public/admin/images/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/css/metisMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/css/slicknav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/css/default-css.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('public/admin/css/responsive.css') }}">
    <!-- modernizr css -->
    <script src="{{ asset('public/admin/js/vendor/modernizr-2.8.3.min.js') }}"></script>

    @yield("main-style")
</head>

<body>


<!-- preloader area start -->
<div id="preloader">
    <div class="loader"></div>
</div>
<!-- preloader area end -->

<!-- page container area start -->
<div class="page-container">
@include("admin.includes.sidebar")

@yield("main-content")

<!-- footer area start-->
    <footer>
        <div class="footer-area">
            <p>© Copyright 2022. All right reserved.</p>
        </div>
    </footer>
    <!-- footer area end-->
</div>
<!-- page container area end -->


<!-- jquery latest version -->
<script src="{{ asset('public/admin/js/vendor/jquery-2.2.4.min.js') }}"></script>
<!-- bootstrap 4 js -->
<script src="{{ asset('public/admin/js/popper.min.js') }}"></script>
<script src="{{ asset('public/admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/admin/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('public/admin/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('public/admin/js/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('public/admin/js/jquery.slicknav.min.js') }}"></script>
<!-- others plugins -->
<script src="{{ asset('public/admin/js/plugins.js') }}"></script>
<script src="{{ asset('public/admin/js/scripts.js') }}"></script>
@yield("main-script")

</body>

</html>

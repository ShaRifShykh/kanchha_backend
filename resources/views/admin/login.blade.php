<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login - Kanchha Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('public/frontend/img/logo-white.png') }}">
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

    <style>
        .login-form-head {
            background: #4196F8;
        }
        .form-gp.focused label {
            color: #4196F8;
        }
    </style>

</head>

<body>


<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- preloader area start -->
<div id="preloader">
    <div class="loader"></div>
</div>
<!-- preloader area end -->
<!-- login area start -->
<div class="login-area">
    <div class="container">
        <div class="login-box ptb--100">
            <form action="{{ url('/admin/login') }}" method="POST">
                @csrf
                <div class="login-form-head">
                    <h4>Sign In</h4>
                    <p>to Kanchha</p>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="login-form-body">
                    <div class="form-gp">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" id="exampleInputEmail1">
                        <i style="color: #4196F8;" class="ti-email"></i>
                        <div class="text-danger"></div>
                    </div>
                    <div class="form-gp">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" id="exampleInputPassword1">
                        <i style="color: #4196F8;" class="ti-lock"></i>
                        <div class="text-danger"></div>
                    </div>
                    <div class="submit-btn-area">
                        <button id="form_submit" name="submit" type="submit">Submit <i class="ti-arrow-right"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- login area end -->


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

</body>

</html>

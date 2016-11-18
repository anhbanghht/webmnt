<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>Bình yên - Website quản lý</title>

        <meta name="robots" content="noindex, nofollow">

        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1.0">

        <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        
        <!-- END Icons -->

        <!-- Stylesheets -->
        <!-- Bootstrap is included in its original form, unaltered -->
        <link rel="stylesheet" href="{{ url('public/css/bootstrap.min.css') }}">

        <!-- Related styles of various icon packs and plugins -->
        <link rel="stylesheet" href="{{ url('public/css/plugins.css') }}">

        <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
        <link rel="stylesheet" href="{{ url('public/css/main.css') }}">

        <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

        <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
        <link rel="stylesheet" href="{{ url('public/css/themes.css') }}">
        @yield('add-style')
        <!-- END Stylesheets -->

        <!-- Modernizr (browser feature detection library) & Respond.js (Enable responsive CSS code on browsers that don't support it, eg IE8) -->
        <script src="{{ url('public/js/vendor/modernizr-2.7.1-respond-1.4.2.min.js') }}"></script>
    </head>
    <!-- In the PHP version you can set the following options from inc/config file -->
    <!--
        Available body classes:

        'page-loading'      enables page preloader
    -->
    <body>
        <!-- Error Container -->
        <div id="error-container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text-center">
                    <h1 class=""><i class="fa fa-exclamation-circle text-warning"></i> 404</h1>
                    <h2 class="h3">Lỗi, Trang bạn đang yêu cầu không tồn tại hoặc đã bị xóa bỏ!</h2>
                </div>
                <div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 text-center">
                    <a href="{{url('/')}}" class="btn btn-lg btn-default">Trở lại trang chủ</a>
                </div>
            </div>
        </div>
        <!-- END Error Container -->
         <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
        <a href="#" id="to-top"><i class="fa fa-angle-double-up"></i></a>

        <!-- User Settings, modal which opens from Settings link (found in top right user menu) and the Cog link (found in sidebar user info) -->
        @yield('modal')
        <!-- END User Settings -->

        <!-- Include Jquery library from Google's CDN but if something goes wrong get Jquery from local file (Remove 'http:' if you have SSL) -->
        <script src="{{ url('public/js/vendor/jquery-1.11.1.min.js') }}"></script>
        @yield('add-libs')

        <!-- Bootstrap.js, Jquery plugins and Custom JS code -->
        <script src="{{ url('public/js/vendor/bootstrap.min.js') }}"></script>
        <script src="{{ url('public/js/plugins.js') }}"></script>
        <script src="{{ url('public/js/app.js') }}"></script>
        @yield('add-js')
    </body>
</html>
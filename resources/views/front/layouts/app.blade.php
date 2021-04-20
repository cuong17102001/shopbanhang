<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta content="" name="copyright">
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta content="ja" http-equiv="Content-Language">
    <meta content="text/css" http-equiv="Content-Style-Type">
    <meta content="text/javascript" http-equiv="Content-Script-Type">
    <meta id="viewport" name="viewport" content="" />
    <script>
        if (screen.width <= 736) {
            document.getElementById("viewport").setAttribute("content",
                "width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no");
        }

    </script>
    <title>Home | E-Shopper</title>
    <link href="{{ asset('front/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('front/css/responsive.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="{{ asset('front/images/ico/favicon.ico') }}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144"
        href="{{ asset('front/images/ico/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114"
        href="{{ asset('front/images/ico/apple-touch-icon-114-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72"
        href="{{ asset('front/images/ico/apple-touch-icon-72-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed"
        href="{{ asset('front/images/ico/apple-touch-icon-57-precomposed.png') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('rate/css/rate.css') }}">
    <script src="{{ asset('rate/js/jquery-1.9.1.min.js') }}"></script>
   
</head>
<!--/head-->

<body>
    @include('front.layouts.header')

    @include('front.layouts.slider')

    <section>
        <div class="container">
            <div class="row">

                @include('front.layouts.left')

                @yield('content_front')
            </div>
        </div>
    </section>

    @include('front.layouts.footer')



    <script src="{{ asset('front/js/jquery.js') }}"></script>
    <script src="{{ asset('front/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('front/js/price-range.js') }}"></script>
    <script src="{{ asset('front/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('front/js/main.js') }}"></script>
</body>

</html>

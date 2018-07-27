<!DOCTYPE html>
<html>
    <head>
        <title><?php echo Config('params.site_name'); ?> | @yield('title')</title>
        <meta name="description" content="@yield('description')">
        <meta name="keywords" content="@yield('keywords')" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--iPhone from zooming form issue-->
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
        <link rel="icon" type="image/png" href="{{asset('front/images/favicon.png')}}">
        <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('front/css/stylized.css')}}">
        <link rel="stylesheet" href="{{asset('front/style.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href='{{asset('front/extralized/bootstrap-datetimepicker.css')}}'/>
        <link rel="stylesheet" href='{{asset('front/css/dropdown.css')}}'/>
        <script src="{{asset('/front/js/jquery-2.2.4.min.js')}}"></script>
        <script src="{{asset('/front/extralized/bootstrap-datepicker.js')}}"></script>
        
    </head>
    <body class="transition nav-plusminus slide-navbar slide-navbar--right" >
        @include('front/common/navigation')
        <main id="page-content">
            @yield('content')
            @include('front/common/footer')
            <a href="" class="scrollToTop"><i class="fa fa-arrow-up"></i></a>
        </main>
        <div id="loading"></div>
        <script src="{{asset('/front/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('/front/js/dropdown.js')}}"></script>
        <script src="{{asset('/front/js/viewportchecker.js')}}"></script>
        <script src="{{asset('/front/js/kodeized.js')}}"></script>
        <!--./Swiper Slider -->
        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
        <script type="text/javascript">
            Stripe.setPublishableKey('<?php echo env('STRIPE_SECRET_PK'); ?>');
        </script>
        <script>
        function back() {
            window.location.href = '<?php echo URL::previous();?>';
        }
        </script>
    </body>
</html>

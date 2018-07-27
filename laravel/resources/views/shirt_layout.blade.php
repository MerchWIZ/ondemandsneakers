<!DOCTYPE html>
<html>
    <head>
        <title><?php echo Config('params.site_name'); ?> | @yield('title')</title>
        <meta name="description" content="@yield('description')">
        <meta name="keywords" content="@yield('keywords')" />

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        		
        <link rel="stylesheet" href="{{asset('front/style.css')}}">
        <!--iPhone from zooming form issue-->
        <!--<meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="{{asset('front/images/favicon.png')}}">
        <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('front/style.css')}}">
        <link rel="stylesheet" href="{{asset('front/profile.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/colorized.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/slidenav.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/swiper.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/extralized/daterangepicker.css')}}">
        <link rel="stylesheet" href="{{asset('front/extralized/bootstrap-datetimepicker.css')}}"/>
        <script src="{{asset('/front/js/jquery-2.2.4.min.js')}}"></script>
        {{--<script src="{{asset('front/js/modernizr-2.6.2.min.js')}}"></script>--}}
        {{--<script src="{{asset('/front/js/jquery.easing.1.3.js')}}"></script>--}}
        <script src="{{asset('/front/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('/front/extralized/bootstrap-datepicker.js')}}"></script>
        <script src="{{asset('/front/extralized/moment.min.js')}}"></script>
        <script src="{{asset('/front/extralized/bootstrap-datetimepicker.js')}}"></script>-->


        <!-- CUSTOMIZATION TOOL START -->

       <link href="{{asset('front/tool/css/bootstrap.min.css')}}" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('front/tool/style.css')}}">
        <link rel="stylesheet" href="{{asset('front/tool/css/colorized.css')}}">
        <link rel="stylesheet" href="{{asset('front/tool/css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('front/tool/css/slidenav.css')}}">
        <link rel="stylesheet" href="{{asset('front/tool/css/font-awesome.min.css')}}">
        <!--link rel="stylesheet" href="{{asset('front/tool/css/foundation-icons.css')}}"-->
        <!--link rel="stylesheet" type="text/css" href="{{asset('front/tool/css/flaticon.css')}}"-->
        <link rel="stylesheet" href="{{asset('front/tool/css/swiper.min.css')}}">

        <!-- jQuery -->
        <script src="{{asset('front/tool/js/jquery-2.2.4.min.js')}}"></script>
        <script src="{{asset('front/tool/js/api-1.6.3/dist/fabric.min.js')}}"></script>
        <script src="{{asset('front/tool/js/api-1.6.3/dist/fabricjs_viewport.js')}}"></script>

        <!--<script src="{{asset('front/tool/js/customiseControls.js')}}"></script>-->
        <!--<script src="{{asset('front/tool/js/customiseCornerIcons.js')}}"></script>-->

        <!--browser selector-->
        <script src="{{asset('front/tool/js/css_browser_selector.js')}}" type="text/javascript"></script>

        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

        <!-- CUSTOMIZATION TOOL END -->

    </head>
    <body class="transition nav-plusminus slide-navbar slide-navbar--right modal-vcntr--all" >
@include('front/common/header')
        <main id="page-content">
            @yield('content')
<section class="bottom-area">
			<div class="container">

				<div class="pul-lft ">Copyright 2017. All Rights Reserved</div>
				
				
				<div class="pul-rgt text-right">
					Designed & Developed by <a href="#">Golpik.</a>
				</div>
		
			</div>
		</section>

            <a href="" class="scrollToTop hidden"><i class="fa fa-arrow-up"></i></a>
        </main>
        <div id="loading"></div>
        <script src="{{asset('/front/js/viewportchecker.js')}}"></script>
        <script src="{{asset('/front/js/kodeized.js')}}"></script>
        <!--script src="{{asset('/front/js/swiper.jquery.min.js')}}"></script>
        <script src="{{asset('/front/extralized/daterangepicker.js')}}"></script>
        <script>
            var swiper1 = new Swiper('.s1', {
            pagination: '.swiper-pagination',
                    slidesPerView: '4',
                    centeredSlides: false,
                    paginationClickable: true,
                    nextButton: '.swiper-button-next1',
                    prevButton: '.swiper-button-prev1',
                    spaceBetween: 15,
                    autoplay: 2500,
                    autoplayDisableOnInteraction: false,
                    breakpoints: {
                    1024: {	slidesPerView: 3, spaceBetween: 40 },
                            768: { slidesPerView: 3, spaceBetween: 30 },
                            640: { slidesPerView: 1, spaceBetween: 20 },
                            320: { slidesPerView: 1, spaceBetween: 10 }
                    }
            });
        </script-->


    </body>
</html>

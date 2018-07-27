<!DOCTYPE html>
<html class="broken-image-checker">
    <head>
        <title><?php echo Config('params.site_name'); ?> | @yield('title')</title>
        <meta name="description" content="@yield('description')">
        <meta name="keywords" content="@yield('keywords')" />

        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!--iPhone from zooming form issue (maximum-scale=1, user-scalable=0)-->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
        <link rel="icon" type="image/png" href="{{asset('front/images/favicon.png')}}">
        <link href="{{asset('front/css/bootstrap.min.css')}}" rel="stylesheet">
		<link rel="stylesheet" href="{{asset('front/css/stylized.css')}}">
        <link rel="stylesheet" href="{{asset('front/style.css')}}">
        <link rel="stylesheet" href="{{asset('front/profile.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/colorized.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/animate.css')}}">
        <!--link rel="stylesheet" href="{{asset('front/css/slidenav.css')}}"-->
        <link rel="stylesheet" href="{{asset('front/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/css/swiper.min.css')}}">
        <link rel="stylesheet" href="{{asset('front/extralized/daterangepicker.css')}}">
        <link rel="stylesheet" href="{{asset('front/extralized/bootstrap-datetimepicker.css')}}"/>
        <script src="{{asset('/front/js/jquery-2.2.4.min.js')}}"></script>
        <!--script src="{{asset('front/js/modernizr-2.6.2.min.js')}}"></script-->
        <!--script src="{{asset('/front/js/jquery.easing.1.3.js')}}"></script-->
        <script src="{{asset('/front/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('/front/extralized/bootstrap-datepicker.js')}}"></script>
        <script src="{{asset('/front/extralized/moment.min.js')}}"></script>
        <script src="{{asset('/front/extralized/bootstrap-datetimepicker.js')}}"></script>
        
       


    </head>
    <body class="transition nav-plusminus slide-navbar slide-navbar--right" >
        @include('front/common/navigation')
        <main id="page-content">
            @yield('content')

        </main>
		
            @include('front/common/footer')
            <a href="" class="scrollToTop"><i class="fa fa-arrow-up"></i></a>
        <div id="loading"></div>
        <script src="{{asset('/front/js/viewportchecker.js')}}"></script>
        <script src="{{asset('/front/js/kodeized.js')}}"></script>
		<script src="{{asset('/front/js/fontized.js')}}"></script>
		
		<script>
		


			
			
		
var mainHeight = jQuery( "main" ).height();
			var winHeight = jQuery(window).height();
        if (winHeight > 500) {
            
					if (mainHeight < winHeight ) {
						var headerHeight = jQuery( "header" ).height();
						var headerHeight_pct = Math.round( jQuery('header').height() / jQuery(window).height() * 100 );
						
						var footerHeight = jQuery( "footer" ).height();
						
						var footerHeight_pct = Math.round( footerHeight / winHeight * 100 );
						
					var mainRandomHeight = (80 - headerHeight_pct);
//alert(footerHeight_pct);
						//jQuery("main").css( { marginBottom : -footerHeight } );
						jQuery("main").css("min-height", mainRandomHeight+"vh");
					}
		}
        else {
            console.log("screen width is greater than or equal to 960");
        }
		
		</script>
		<style>
		
			
			footer {
				clear: both;
				float:left;
				width:100%;
			}
			
		</style>
		
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
        <!--./Swiper Slider -->
        <!--datetimepicker-->

        <script type="text/javascript">
            jQuery(function () {
            jQuery('#datetimepicker1').datetimepicker();
            });
        </script>
        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
        <script type="text/javascript">
            Stripe.setPublishableKey('<?php echo env('STRIPE_SECRET_PK1'); ?>');
        </script>
        <script type="text/javascript">
            jQuery(function () {
            jQuery('#datetimepicker1').datetimepicker();
            });
		</script>
    </body>
</html>

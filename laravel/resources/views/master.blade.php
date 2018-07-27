<!DOCTYPE html>

{{--{{asset('/front/--}}
{{--')}}--}}

<html lang="en" class="broken-image-checker">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--iPhone from zooming form issue (maximum-scale=1, user-scalable=0)-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <title>Home</title>

    <link rel="icon" type="image/png" href="{{asset('/front/images/favicon.png')}}">

    <!-- Bootstrap --><link href="{{asset('/front/css/bootstrap.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('/front/css/stylized.css')}}">
    <link rel="stylesheet" href="{{asset('/front/style.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/colorized.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/slidenav.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/font-awesome.min.css')}}">

    <!-- jQuery -->
    <!--[if (!IE)|(gt IE 8)]><!-->
    <script src="{{asset('/front/js/jquery-2.2.4.min.js')}}"></script>
    <!--<![endif]-->


    <!--[if lte IE 8]>
    <script src="{{asset('/front/js/jquery1.9.1.min.js')}}"></script>
    <![endif]-->

    <!--browser selector-->
    <script src="{{asset('/front/js/css_browser_selector.js')}}" type="text/javascript"></script>


    <script src="{{asset('/front/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('/front/js/respond.min.js')}}"></script>


</head>
<body class="transition nav-plusminus slide-navbar slide-navbar--right">

<header>
    <section class="hdr-top-area">
        <div class="container">
            <div class="hdr-top__lft pul-lft clrlist">
                <ul>
                    <li><a href="#">Call us at: +012-345-6789</a></li>
                </ul>
            </div>


            <div class="hdr-top__rgt pul-rgt clrlist listdvr">
                <ul>
                    <li><a href="#"><i class="icon"><img src="images/topicon1.png" alt="img" /></i> Login</a></li>
                    <li><a href="#"><i class="icon"><img src="images/topicon2.png" alt="img" /></i> My Account</a></li>
                    <li><a href="#"><i class="icon"><img src="images/topicon3.png" alt="img" /></i> My Cart</a></li>
                </ul>
            </div>


        </div>
    </section>

    <section class="hdr-area hdr-nav hdr--sticky cross-toggle bg-white">
        <div class="container">
            <nav class="navbar navbar-default" role="navigation" id="slide-nav">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="./"><img src="images/logo.png" alt="logo" class="broken-image"/></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div id="slidemenu">
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-main pul-rgt">

                                <li class=""><a href="products.php#!1">Footwear</a></li>
                                <li class=""><a href="products.php#!2">T-Shirt</a></li>
                                <li class=""><a href="products.php#!3">Soccer Jersey</a></li>
                                <li class=""><a href="products.php#!4">Hoodies</a></li>
                                <li class=""><a href="products.php#!5">Jogging Pants</a></li>
                                <li class=""><a href="products.php#!6">Dye Leggings</a></li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hats</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#c">Action</a></li>
                                        <li><a href="#c">Another action</a></li>
                                        <li><a href="#c">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#c">Separated link</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#c">One more separated link</a></li>
                                    </ul>
                                </li>
                                <li class=""><a href="products.php#!7">Dye Sub Hoodies</a></li>


                            </ul>



                        </div><!-- /.navbar-collapse -->
                    </div>
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </section>
</header>

<main id="page-content">

    <section class="select-prod-area ">
        <div class="container">

            <div class="hed">
                <h2>Select Product to Customized</h2>
            </div>

            <div class="row">

                <div class="prod-box col-sm-3">
                    <div class="prod__inr">
                        <div class="prod__img">
                            <a href="customized.php"><img src="images/prod1.jpg" alt="img" /></a>
                        </div>
                        <div class="prod__cont">
                            <a href="customized.php"><h3>Design Your Own T-Shirt</h3></a>
                            <div class="prod__actions btn-atc">
                                <a href="customized.php" class="btn btn-primary">Customize Now</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="prod-box col-sm-3">
                    <div class="prod__inr">
                        <div class="prod__img">
                            <a href="customized.php"><img src="images/prod2.jpg" alt="img" /></a>
                        </div>
                        <div class="prod__cont">
                            <a href="customized.php"><h3>Design Your Own Hoodies</h3></a>
                            <div class="prod__actions btn-atc">
                                <a href="customized.php" class="btn btn-primary">Customize Now</a>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="prod-box col-sm-3">
                    <div class="prod__inr">
                        <div class="prod__img">
                            <a href="customized.php"><img src="images/prod3.jpg" alt="img" /></a>
                        </div>
                        <div class="prod__cont">
                            <a href="customized.php"><h3>Design Your Own Jogging Pants</h3></a>
                            <div class="prod__actions btn-atc">
                                <a href="customized.php" class="btn btn-primary">Customize Now</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="prod-box col-sm-3">
                    <div class="prod__inr">
                        <div class="prod__img">
                            <a href="customized.php"><img src="images/prod4.jpg" alt="img" /></a>
                        </div>
                        <div class="prod__cont">
                            <a href="customized.php"><h3>Design Your Own Soccer Jersey</h3></a>
                            <div class="prod__actions btn-atc">

                                <a href="customized.php" class="btn btn-primary">Customize Now</a>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="prod-box col-sm-3">
                    <div class="prod__inr">
                        <div class="prod__img">
                            <a href="customized.php"><img src="images/prod5.jpg" alt="img" /></a>
                        </div>
                        <div class="prod__cont">
                            <a href="customized.php"><h3>Design Your Own Shoes</h3></a>
                            <div class="prod__actions btn-atc">

                                <a href="customized.php" class="btn btn-primary">Customize Now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="prod-box col-sm-3">
                    <div class="prod__inr">
                        <div class="prod__img">
                            <a href="customized.php"><img src="images/prod6.jpg" alt="img" /></a>
                        </div>
                        <div class="prod__cont">
                            <a href="customized.php"><h3>Design Your Dye Leggings</h3></a>
                            <div class="prod__actions btn-atc">

                                <a href="customized.php" class="btn btn-primary">Customize Now</a>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="prod-box col-sm-3">
                    <div class="prod__inr">
                        <div class="prod__img">
                            <a href="customized.php"><img src="images/prod7.jpg" alt="img" /></a>
                        </div>
                        <div class="prod__cont">
                            <a href="customized.php"><h3>Design Your Own Caps & Hats</h3></a>
                            <div class="prod__actions btn-atc">

                                <a href="customized.php" class="btn btn-primary">Customize Now</a>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="prod-box col-sm-3">
                    <div class="prod__inr">
                        <div class="prod__img">
                            <a href="customized.php"><img src="images/prod8.jpg" alt="img" /></a>
                        </div>
                        <div class="prod__cont">
                            <a href="customized.php"><h3>Design Your Dye Sub Hoodies</h3></a>
                            <div class="prod__actions btn-atc">

                                <a href="customized.php" class="btn btn-primary">Customize Now</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </section>

    <footer>
        <section class="ftr-area ftr--blind" id="footer">
            <div class="container">

                <div class="ftr__box col-sm-3 listview clrlist list-icon">
                    <h4>Contact Us</h4>
                    <ul>
                        <li><i class="fa fa-map-marker"></i> <span>Great Store London Street <br>123 United Kingdom.</span></li>
                        <li><i class="fa fa-envelope"></i>
                            <span><ul><li>Info@Company.com</li><li>Support@Company.com.</li></ul></span></li>

                        <li><i class="fa fa-phone"></i> <span><ul><li>(+00) 123-456-789</li><li>(+00) 123-456-789</li></ul></span></li></li>

                    </ul>
                </div>
                <div class="ftr__box ftr__nav col-sm-3 clrlist listview">
                    <h4>Our Offer</h4>
                    <ul>
                        <li><a href="#">Returns</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Shipping Rates</a></li>
                        <li><a href="#">Safe & Gurantee</a></li>
                        <li><a href="#">Contact Info</a></li>
                    </ul>
                </div>
                <div class="ftr__box ftr__nav col-sm-2 clrlist listview">
                    <h4>Information</h4>
                    <ul>
                        <li><a href="#">Our Stores</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Delivery</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Secure Payment</a></li>
                        <li><a href="#">Sitemap</a></li>
                    </ul>
                </div>

                <div class="ftr__box col-sm-4 ">
                    <h4>Newsletter</h4>
                    <div class="cont">Lorem Ipsum is simply dummy text of thy text ever since  the  it to make a type specimen book.</div>

                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter Your E-mail Address" >
			  <span class="input-group-addon p0">
				<button class="btn btn-default" type="button">GO</button>
			  </span>
                    </div>


                    <div class="social-icons clrlist icon-rounded ">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                            <li><a href="#"><i class="fa fa-google"></i></a></li>
                        </ul>
                    </div>


                    <div class="payment mb20"><img src="images/payment-methods.png" alt="img" /></div>
                </div>

            </div>
        </section>


        <section class="bottom-area">
            <div class="container">

                <div class="pul-lft "> Copyright 2017. All Rights Reserved</div>


                <div class="pul-rgt text-right">
                    Designed & Developed by <a href="#">Golpik.</a>
                </div>

            </div>
        </section>

    </footer>

    <a href="" class="scrollToTop"><i class="fa fa-arrow-up"></i></a>

</main>

<!--Bootstrap-->
<script src="{{asset('/front/js/bootstrap.min.js')}}"></script>
<!--./Bootstrap-->

<!--Major Scripts-->
<script src="{{asset('/front/js/viewportchecker.js')}}"></script>
<script src="{{asset('/front/js/kodeized.js')}}"></script>
<!--./Major Scripts-->


</body>
</html>
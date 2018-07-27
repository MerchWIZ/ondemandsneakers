<?php
$cart = Session::get('cart');
$categories = App\Categories::where("status", "=", 1)->get();
?>

<header>
	
	@include('front/common/header')

	<section class="hdr-area hdr-nav hdr--sticky cross-toggle bg-white nav-plusminus">
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
					<a class="navbar-brand" href="{{url('')}}/"><img src="{{asset('')}}/front/images/logo.png" alt="logo"/></a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div id="slidemenu">
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					  <ul class="nav navbar-nav navbar-main pul-rgt">
						          
						<li class=""><a href="{{url('/')}}">Home</a></li>
						<li class=""><a href="{{url('/about-us')}}">About Us</a></li>
						<li class="dropdown">
						  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Products Categories</a>
						  <ul class="dropdown-menu">
                                                      
                                                      @foreach($categories as $category)
							<li><a href="<?php echo url('category/' . $category->id); ?>">{{ $category->name }}</a></li>
                                                        @endforeach
							
						
						  </ul>
						</li>
						<li class=""><a href="{{url('/contact-us')}}">Contact Us</a></li>
				
					  </ul>
					   


					</div><!-- /.navbar-collapse -->
				</div>
			  </div><!-- /.container-fluid -->
			</nav>
		</div>
	</section>
</header>

	<section class="hdr-top-area ">
		<div class="container">
			<div class="hdr-top__lft pul-lft clrlist">
				<ul>
					<li><a href="#">Call us at: +1 (213) 375-8000</a></li>
				</ul>
			</div>
			
			
			<div class="hdr-top__rgt pul-rgt clrlist listdvr">
				<ul>
				<?php
                                if (isset(Auth::user()->id)) {
                                    ?>

                                    <li class="dropdown" ><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i><img src="{{asset('')}}/front/images/topicon1.png" id="cartIcon10"></i> MY ACCOUNT </a>

                                        <ul class="dropdown-menu">
                                            <li ><a href="{{ url('myorders')}}" class="pagelinkcolor">My Orders</a></li>
                                            <li ><a href="{{ url('mydesigns')}}" class="pagelinkcolor">My Designs</a></li>
                                            <li><a href="{{ url('changepassword')}}" class="pagelinkcolor">Change Password</a></li>
                                            <li><a href="{{ url('profile')}}" class="pagelinkcolor">Profile</a></li>
                                            <li><a href="{{ url('auth/logout')}}" class="pagelinkcolor">Log Out</a></li>
                                        </ul>
                                    </li>

<li><a href="{{asset('/cart')}}"><i class="icon"><img src="{{asset('')}}/front/images/topicon3.png" alt="img" /></i> My Cart</a></li>
                                <?php
                                } else {
                                ?>
                                    <li><a href="{{url('')}}/signup"><i class="icon"><img src="{{asset('')}}/front/images/topicon1.png" alt="img" /></i> Login</a></li>
                                <?php
                                }
                                ?>
								
					
					<!--<li><a href="#"><i class="icon"><img src="{{asset('')}}/front/images/topicon2.png" alt="img" /></i> My Account</a></li>-->
					<!--<li><a href="#"><i class="icon"><img src="{{asset('')}}/front/images/topicon3.png" alt="img" /></i> My Cart</a></li>-->
				</ul>
			</div>
			
			
		</div>
	</section>

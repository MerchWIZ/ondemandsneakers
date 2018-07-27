<footer>
		<section class="ftr-area ftr--blind" id="footer">
			<div class="container">
				
				<div class="ftr__box col-sm-3 listview clrlist list-icon">
					<h4>Contact Us</h4>
					<ul>
                                            

						<li><i class="fa fa-map-marker"></i> <span>202 S Macon St<br>Meadville, Missouri 64659</span></li>
						<li><i class="fa fa-envelope"></i>
							<span><ul><li>Info@merchwiz.com</li><li>support@merchwiz.com</li></ul></span></li>
							
						<li><i class="fa fa-phone"></i> <span><ul><li>+1 (213) 375-8000</li></ul></span></li></li>

					</ul>
				</div>
				<div class="ftr__box ftr__nav col-sm-3 clrlist listview ccsa-3dflip">
					<h4>Our Offer</h4>
					<ul>
						<li><a href="{{url('/returns')}}">Returns</a></li>
						<li><a href="{{url('/privacy')}}">Privacy Policy</a></li>
						<li><a href="{{url('/shipping-rates')}}">Shipping Rates</a></li>
						<li><a href="{{url('/faq')}}">FAQ</a></li>
						
					</ul>
				</div>
				<div class="ftr__box ftr__nav col-sm-2 clrlist listview">
					<h4>Information</h4>
					<ul>
						<li><a href="{{url('/bulk-orders')}}">Bulk Orders</a></li>
						<li><a href="{{url('/contact-us')}}">Contact Us</a></li>
						<li><a href="{{url('/design-guidelines')}}">Design Guidelines</a></li>
						<li><a href="{{url('/about-us')}}">About Us</a></li>
						<li><a href="{{url('/terms-conditions')}}">Terms and Conditions</a></li>
						<li><a href="{{url('/sitemap')}}">Sitemap</a></li>
					</ul>
				</div>
				
				<div class="ftr__box col-sm-4 ftr__newsletter col-xm-12">
					<h4>Newsletter</h4>
					<div class="cont">Subscribe our Newsletter for latest updates.</div>
				
                                         <form role="form">
			<div class="input-group">
                            
                             @if ($errors->has('name'))
                        <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                        
			  <input name="name" id="exampleInputEmail2" type="text" class="form-control" placeholder="Enter Your Name" required="required">
                          <input name="email" id="exampleInputPassword2" type="text" class="form-control" placeholder="Enter Your E-mail Address" required="required">
			 <input type="hidden" name="_token" value="{{csrf_token()}}">
                          <span class="input-group-addon p0">
				<button class="btn btn-default" type="submit" id="subscribe">GO</button>
                                
                                 
			  </span>
                         <strong><div id="msg" class="pull-left"></div></strong>
			</div>
			
			 </form>
				<div class="social-icons clrlist icon-rounded ">
					<ul>
                                            <li><a href="https://www.facebook.com/" target="blank"><i class="fa fa-facebook"></i></a></li>
						<li><a href="https://www.twitter.com/" target="blank"><i class="fa fa-twitter"></i></a></li>
						<li><a href="https://www.rss.com/" target="blank"><i class="fa fa-rss"></i></a></li>
						<li><a href="https://www.youtube.com/" target="blank"><i class="fa fa-youtube"></i></a></li>
						<li><a href="https://www.google.com/" target="blank"><i class="fa fa-google"></i></a></li>
					</ul>
				</div>
				
			
					<div class="payment mb20"><img src="{{asset('')}}/front/images/payment-methods.png" alt="img" /></div>
				</div>

			</div>
		</section>
		
		
		<section class="bottom-area">
			<div class="container">

				<div class="pul-lft ">Copyright 2017. All Rights Reserved</div>
				
				
				<div class="pul-rgt text-right">
					Designed & Developed by <a href="#">Golpik.</a>
				</div>
		
			</div>
		</section>
		
	</footer>
<script type="text/javascript">
$('#subscribe').click(function(){
$('form').submit(function(){
  var postData = $(this).serialize();
  
  $.ajax({
    type: 'POST',
    data: postData,
    dataType:'json',
    url: '<?php echo url('newsletter/store'); ?>',
    success: function(data){
      if (data == 1) 
      {
      $('#msg').html('Successfully Submitted!');
      alert('Successfully Submitted!');
      window.location.reload();
      }
      else
      {
      $('#msg').html(data.email[0]);  
      alert('Problem with your input');
      window.location.reload();
      }
    },
    error: function(data){
      console.log(data);
      alert('There was an error adding your comment');
    }
  });
  
  return false;
});
});
</script>
	
	
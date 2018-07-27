@extends('login_signup')

@section('content')


{!! Form::open(array( 'class' => 'form','url' => 'postOrder', 'name' => 'checkout')) !!}
<div class="row">
    <div class="container-fluid">
   	    <div class="checkout-back">
  		    <div class="col-lg-12 col-md-12 col-sm-12">
                   
<p>Your Payment was successful </p>
<p>
Thank you for your payment. Your transaction has been completed, and a receipt for your purchase has been emailed to you. You will receive your first issue of the Eurofish magazine when the next issue is relased. As a paying subscriber you will also receive access to our online version for FREE. This will be sent to the email address you provided. We will contact you before your subscription expires to ensure that you receive the magazine without interruption.
If you have any comments or questions please do not hesitate to contact us:
</p>
 
<p>Tel.: +45 333 777 55</p>
<p>Fax: +45 333 777 56</p>
<p>info@eurofishmagazine.com</p>
<p>Thanks again and have a great day.</p>
              
		   
            	</div>
                
          	</div>
      </div>
    </div>
    
   
    
	 {!! Form::close() !!} 
@endsection


@extends('layout')

@section('content')

<section class="payment-succces-area">
        <div class="container">

              <div class="hed"><h2>{{ $content->title }}</h2></div>  
              <div class="cont col-sm-12"> 
				<pre>{{ @strip_tags($content->body) }}</pre>
              </div>
		</div>
</section>
						
				
@endsection
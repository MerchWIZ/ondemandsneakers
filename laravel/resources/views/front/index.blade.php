@extends('layout')
<?php
$title = 'Home';
$description = '';
$keywords = '';
?>
@include('front/common/meta')
@section('content')

	<section class="select-prod-area ">
		<div class="container">
			
			<div class="hed">	
				<h2>Select Product to Customize</h2>
			</div>
			
			<div class="row">			
			 @include('front.products.categories')
			 
			</div>

		</div>
	</section>

<script type="text/javascript">

    $(function () {
        $("#cartIcon1").attr("src", "{{asset('')}}/front/images/cart-icon.png");
        $("#cartIcon2").attr("src", "{{asset('')}}/front/images/cart-icon2.png");
    });

</script>

<script type="text/javascript">

    $(function () {
        $("#hdr-icon1").attr("src", "{{asset('')}}/front/images/hdricon1.png");
        $("#hdr-icon2").attr("src", "{{asset('')}}/front/images/hdricon2.png");
    });

</script>
@endsection

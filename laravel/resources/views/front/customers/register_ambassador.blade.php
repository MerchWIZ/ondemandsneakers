@extends('login_signup')
@section('content')
<?php
$required = 'required';
$role_id = 3;
?>

<!-- <div id="fh5co-programs-section">
    <div class="container">
        <div class="col-sm-12">
            <div class="container">
                @include('front/customers/register')
            </div>
        </div>
    </div>
</div> -->
	<section class="register-area">
		<div class="container">
			
			<div class="hed">
				<h2>REGISTER AS AN <span>AMBASSADOR</span></h2>
				<p>If you are interested in joining Hammer Fit as an Ambassador, please fill this registration form.</p>
			</div>
			
			<div class="reg__main col-sm-12 p0">
			<form class="register" action="<?php echo url('signUpPost'); ?>" name="register" method="post">
			@include('front/customers/register')
			<input type="hidden" name="role_id" value="3">
			<input type="hidden" name="_token" value="{{csrf_token()}}">
			</form>
			</div>
		</div>
	</section>
@endsection
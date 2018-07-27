@extends('layout')

@section('content')

<section class="touch-area">
<div class="container">
			
		<?php echo $model->body;?>	
		</div>
	</section>
	
	<section class="contact-area">
		<div class="container">
			<div class="hed">
				<h2>CONTACT <span>US</span></h2>
				<p>Thanks for getting in touch with us</p>
			</div>
			<div class="flash-message">
			@foreach (['danger', 'warning', 'success', 'info'] as $msg)
			@if(Session::has('alert-' . $msg))

			<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
			@endif
			@endforeach
			</div> <!-- end .flash-message -->
			<div class="contact__form col-sm-12 p0">
				<form method="POST" action="{{ URL::to('contact-send') }}">
					<div class="row">
						<div class="form-group col-sm-6">
						  <input type="text" name="f_name" class="form-control" id="firstName" placeholder="First Name" required="required" value="{{ old('f_name') }}">
						    @if ($errors->has('f_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('f_name') }}</strong>
                                    </span>
                            @endif
						</div>
						<div class="form-text col-sm-6">
						  <input type="text" name="l_name" class="form-control" id="lastName" placeholder="Last Name" required="required" value="{{ old('l_name') }}">
						    @if ($errors->has('l_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('l_name') }}</strong>
                                    </span>
                                @endif
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-6">
						  <input type="email" name="email" class="form-control" id="email" placeholder="Email Address" required="required" value="{{ old('email') }}">
						    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
						</div>
						<div class="form-text col-sm-6">
						  <input type="text" name="phone_number" class="form-control" id="phoneNumber" placeholder="Phone Number" required="required" value="{{ old('phone_number') }}">
						    @if ($errors->has('phone_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-12">
						  <textarea class="form-control" name="message" rows="9" id="comment" placeholder="Your Message!" required="required">{{ old('message') }}</textarea>
						    @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('message') }}</strong>
                                    </span>
                                @endif
						</div>
					</div>
					<div class="row">
						<div class="form-group col-sm-12">
                        <span class="captcha-img">{!! Recaptcha::render() !!}</span>
                                	@if ($errors->has('g-recaptcha-response'))
                        <span class="help-block">
                            <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                        </span>
                        @endif 
						</div>
					</div>

					
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button type="submit" class="btn btn-default contact__submit">SUBMIT</button>
				</form>
			</div>
		</div>
	</section>
@include('front/common/newsletters')
<script src="https://www.google.com/recaptcha/api.js"></script>
@endsection
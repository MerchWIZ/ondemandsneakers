@extends('login_signup')
<?php
$title = 'Join';
$description = "";
$keywords = "";
?>
@include('front/common/meta')
@section('content')
<?php
$required = 'required';
?>
<section class="account-area">
    <div class="container">
        <div class="hed">
            <h2>My <span>ACCOUNT</span></h2>
            <p>Get started with our step process</p>
        </div>
		 @if (count($errors) > 0)
            <div class="alert alert-danger col-sm-6">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
			<div class="clearfix"></div>
            @endif
        <div class="acct__login acct__inr__title text-center col-sm-6">
            <h3>Login</h3>
           
            <form method="POST" class="form" action="{{ url('postLogin') }}">
                <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                <div class="form-group mb25">
                    <input type="email" class="form-control" name="email" placeholder="Email Address" required />
                </div>
                <div class="form-group mb10">
                    <input type="password" class="form-control" placeholder="Password" name="password" required  />
                </div>
                <div class="checkbox text-left">
                    <label><input type="checkbox" class="checkbox" name="remember">Remember me</label>
                </div>
                <div class="acct__lost">
                    <a href="{{url('')}}/password/email"><i class="fa fa-life-ring" aria-hidden="true"></i>Lost your password?</a>
                </div>
                <div class="clearfix"></div>
                <span class="form-group mb25" >email = demo@yopmail.com</span>
                
                 <div class="clearfix"></div>
                pass = gOlpik0!
                <div class="clearfix"></div>
                <button type="submit" class="btn btn-default acct__login__btn">Login</button>
            </form>
        </div>
        <div class="acct__login acct__reg acct__inr__title text-center col-sm-6">
           
<!--            <div class="reg__athlete__btn">
                <a href="{{url('signup/athlete')}}">Register as an Athlete</a>
            </div>
            <div class="reg__athlete__btn reg__amb__btn">
                <a href="{{url('signup/ambassador')}}">Register as an Ambassador</a>
            </div>-->
            <div class="reg__athlete__btn reg__amb__btn">
                <a href="{{url('signup/user')}}">REGISTER </a>
            </div>
        </div>
    </div>
</section>

@include('front/common/newsletters')

@endsection
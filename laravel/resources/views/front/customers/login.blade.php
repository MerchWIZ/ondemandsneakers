@extends('login_signup')
<?php
$title = 'Signup';
$description = '';
$keywords = '';
?>
@include('front/common/meta')
@section('content')
<?php
$required = 'required';
?>
<div id="fh5co-programs-section">
    <div class="container">
        <div class="col-sm-12">
            <h2>Log in and get to work</h2>
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @include('front/customers/login_form')
        </div>
        <div class="col-sm-12">
            <p class="form-group m-lg-bottom m-md-top">
                Don't have an account? <a data-ng-non-bindable="" class="btn btn-default btn-sm p-sm-top-bottom m-0-top-bottom" href="/signup/create-account">Sign up</a>
            </p>
        </div>
    </div>
</div>
@endsection
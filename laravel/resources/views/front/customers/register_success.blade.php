@extends('login_signup')

@section('content')
<section class="account-area">
    <div class="container">
        <div class="hed">
            <h2>Thank you <span><?php echo $user->firstName ?> <?php echo $user->lastName ?></span></h2>
            <p>Please confirm your email address. A confimation email has been sent to you email address.</p>
        </div>
        <div class="acct__login acct__reg acct__inr__title text-center col-sm-12">
            <div class="reg__athlete__btn col-sm-3">
                <a href="{{url('profile')}}">View Profile</a>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection
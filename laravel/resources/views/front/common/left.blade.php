<?php
$role = Auth::user()->role->role;
?>
<ul class="nav nav-pills nav-stacked">
    <li class=""><a href="{{ url('profile') }}">Personal</a></li>
    <li class=""><a href="{{ url('address') }}">Address</a></li>

    @include('front/common/left_'.$role)
    <!--
        <li class=""><a href="{{ url('training-details') }}">Training Details</a></li>
        <li class=""><a href="{{ url('calculators') }}">Calculators</a></li>
    -->
    <li ><a href="{{ url('myorders')}}" >My Orders</a></li>
    <li><a href="{{ url('changepassword')}}" >Change Password</a></li>
    <li><a href="{{ url('auth/logout')}}">Log Out</a></li>
</ul>

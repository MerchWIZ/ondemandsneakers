@extends('layout')

@section('content')
<section class="product-area scale--hover">
    <div class="container">
        <div class="hed">
            <h2>Searched Result <span></span></h2>
            <p></p>
        </div>

    @include('front/hooks/ambassador')   
    </div>
</section>	
<div class="clearfix"></div>
<div class="lnk-btn inline-block view-btn"></div>
@endsection

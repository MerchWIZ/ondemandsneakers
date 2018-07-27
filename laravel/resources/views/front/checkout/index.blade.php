@extends('layout')
@section('content')
<?php
$currency = Config::get('params.currency');
$required = "'required'";
?>
<div id="fh5co-contact" class="__web-inspector-hide-shortcut__">
    <div class="container">
	<div class="hed"><h2>Billing Information</h2></div>
        <div class="row">
                <div class="checkout-back">
                    {!! Form::open(array( 'class' => 'form','id' => 'form','url' => 'postOrder', 'name' => 'checkout')) !!}
                    <div class="checkout-area col-sm-8 p0">
                        @if (count($errors->checkout) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->checkout->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div id="billing_information" class="billing_information">
                            
                            <div class="form-group col-sm-6">
                                {!! Form::label('First Name') !!}
                                {!! Form::text('billingFirstName', $user->firstName , array('class' => 'form-control',$required) ) !!}
                            </div>
                            <div class="form-group col-sm-6">
                                {!! Form::label('Last Name') !!}
                                {!! Form::text('billingLastName', $user->lastName , array('class' => 'form-control',$required) ) !!}
                            </div>
                            <div class="form-group col-sm-6">
                                {!! Form::label('email') !!}
                                {!! Form::text('billingEmail',  $user->email , array('class' => 'form-control',$required) ) !!}
                            </div>
                            <?php /* */ ?>
                            <div class="form-group col-sm-6">
                                {!! Form::label('country') !!}
                                {!! Form::select('billing_country_id', 
                                $countries, 
                                $address->country, 
                                ['class' => 'form-control',$required]) !!}
                            </div>
                            <?php #$address->country  ?>
                            <div class="form-group col-sm-6">
                                {!! Form::label('state') !!}
                                {!! Form::text('billingState', $address->state , array('class' => 'form-control',$required) ) !!}
                            </div>
                            <div class="form-group col-sm-6">
                                {!! Form::label('city') !!}
                                {!! Form::text('billingCity', $address->city , array('class' => 'form-control',$required) ) !!}
                            </div>
                            <div class="form-group col-sm-12">
                                {!! Form::label('address line 1') !!}
                                {!! Form::text('billingAddress1', $address->address , array('class' => 'form-control',$required) ) !!}
                            </div>
                            <div class="form-group col-sm-12">
                                {!! Form::label('address line 2') !!}
                                {!! Form::text('billingAddress2', null , array('class' => 'form-control','') ) !!}
                            </div>
                            <div class="form-group col-sm-6">
                                {!! Form::label('Zip') !!}
                                {!! Form::text('billingZip', $address->zip , array('class' => 'form-control',$required) ) !!}
                            </div>
                            <div class="form-group col-sm-6">
                                {!! Form::label('phone') !!}
                                {!! Form::text('billingPhone', $address->phone , array('class' => 'form-control',$required) ) !!}
                            </div>
                            <div class="form-group col-sm-12">
                                {!! Form::checkbox('isShippingDifferent',1,false,['id'=>'is_shipping_different']); !!}
                                Shipping address is different from billing. 
                            </div>
                        </div>
                        <div id="shipping_information" class="billing_information" style="display: none;">
                            <div class="form-group col-sm-6">
                                <h2 class="head">Shipping Information</h2>
                            </div>
                            <div class="form-group col-sm-6">
                                {!! Form::label('firstName') !!}
                                {!! Form::text('shippingFirstName', $user->firstName , array('class' => 'form-control',$required) ) !!}
                            </div>
                            <div class="form-group col-sm-6">
                                {!! Form::label('lastName') !!}
                                {!! Form::text('shippingLastName', $user->lastName , array('class' => 'form-control','') ) !!}
                            </div>

                            <div class="form-group col-sm-6">
                                {!! Form::label('country') !!}
                                {!! Form::select('shipping_country_id',
                                $countries,
                                $address->country,
                                ['class' => 'form-control',$required]) !!}
                            </div>
                            <div class="form-group col-sm-6">
                                {!! Form::label('state') !!}
                                {!! Form::text('shippingState', $address->state , array('class' => 'form-control','') ) !!}
                            </div>
                            <div class="form-group col-sm-6">
                                {!! Form::label('city') !!}
                                {!! Form::text('shippingCity', $address->city , array('class' => 'form-control','') ) !!}
                            </div>
                            <div class="form-group col-sm-6">
                                {!! Form::label('address line 1') !!}
                                {!! Form::text('shippingAddress1', $address->address , array('class' => 'form-control','') ) !!}
                            </div>
                            <div class="form-group col-sm-6">
                                {!! Form::label('address line 2') !!}
                                {!! Form::text('shippingAddress2', null , array('class' => 'form-control','') ) !!}
                            </div>
                            <div class="form-group col-sm-6">
                                {!! Form::label('zip') !!}
                                {!! Form::text('shippingZip', $address->phone , array('class' => 'form-control',$required) ) !!}
                            </div>
                            <div class="form-group col-sm-6">
                                {!! Form::label('phone') !!}
                                {!! Form::text('shippingPhone', $address->phone , array('class' => 'form-control',$required) ) !!}
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        <div id="shipping_method" class="billing_information">
                            <div class="hed"><h2>Select your shipping:</h2></div>
                            <div class="form-group col-sm-12 checkboxs clrlist listview">
								<ul>
									@foreach($shippings as $shipping)
										<li>
										{!! Form::radio('shipping_id', $shipping->id, true, ['class' => '', 'id' => 'selectyourshipping_'.$shipping->id ]) !!}  
										<label for="selectyourshipping_<?php echo $shipping->id; ?>">
											<?php echo $shipping->name; ?> + {{ $currency[Config::get('params.currency_default')]['symbol']}} <?php echo $shipping->price; ?> 
										</label>
										</li>
									@endforeach
								</ul>
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div id="payment_information" class="billing_information">
                            <div class="form-group col-sm-8">
                                {!! Form::label('Additional Message') !!}
                                {!! Form::textarea('message', null, ['size' => '105x3','class' => 'form-control',$required]) !!} 
                            </div>
                            <!--
                            <h2 class="head">Payment Information</h2>
                            <div class="form-group col-sm-6">
                                               {!! Form::label('Name on Card') !!}
                                               {!! Form::text('name', 'Aftab Khan' , array('class' => 'form-control',$required) ) !!}
                            </div>
                            <div class="form-group col-sm-6">
                                               {!! Form::label('Card Number') !!}
                                               {!! Form::text('cardNumber', 1111111111 , array('maxlength'=>'16','class' => 'form-control',$required) ) !!}
                            </div>
                            <?php
                            $months[''] = "Month";
                            for ($i = 1; $i <= 12; $i++) {
                                $months[$i] = date("F", mktime(0, 0, 0, $i, 1, 2011));
                            }

                            $years[''] = "Year";
                            for ($i = date('Y'); $i <= date('Y') + 12; $i++) {
                                $years[$i] = $i;
                            }
                            ?>
                            
                            
                            <div class="form-group col-sm-6">
                                               {!! Form::label('Expiration Date') !!}
                               <div class="row">
                                   <div class="col-md-6" >
                                                       {!! Form::select('expiryMonth', 
                                                            (['' => 'Month']+ $months), 
                                                                    null, 
                                                                    ['class' => 'form-control',$required]) !!}
                                    </div>
                                    <div class="col-md-5 col-sm-offset-1" >   
                                        {!! Form::select('expiryYear', 
                                                              (['' => 'Years']+ $years), 
                                                                    null, 
                                                                    ['class' => 'form-control',$required]) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-sm-6">
                                               {!! Form::label('CV CODE') !!}
                                               {!! Form::text('cardCVC', 123 , array('class' => 'form-control',$required) ) !!}
                            </div>-->
                            <div class="form-group col-sm-12">
								<button type="submit" class="btn btn-default">Order Now</button>
							</div>
                        </div>  
                    </div>  

                    <div class="sidebar col-sm-4">
                        <div class="order-cont">
                            <span class="order-total-head">Order Summary</span>
                            {{--*/ $sum = 0 /*--}}
                            @foreach ($cart as $product)
                            {{--*/ $sum = $sum+($product->total_price*$product->quantity)  /*--}}
                            <span class="order-total-descrp">{{$product->product_name}} {{ $currency[Config::get('params.currency_default')]['symbol']}} {{$product->total_price}}</span>
                            @endforeach
                        </div>
                       

                        <br clear="all" /><br />

                        @include('front/orders/right')
                        
                        
                        
                        <div class="payment-info col-sm-12  fom-shad mb30">
                <h3>Payment Information</h3>
                <div class="form-group" id="cc-group">
                    <!--
                    4242424242424242
                    -->
                    {!! Form::label('cc', 'Credit card number:') !!}

                    {!! Form::text('cc','4242424242424242' , [

                    'class'                         => 'form-control',
                    'required'                      => 'required',
                    'data-stripe'                   => 'number',
                    'data-parsley-type'             => 'number',
                    'maxlength'                     => '16',
                    'data-parsley-trigger'          => 'change focusout',
                    'data-parsley-class-handler'    => '#cc-group'

                    ]) !!}

                </div>

                <div class="form-group" id="ccv-group">
                    {!! Form::label('CVC', 'CVC (3 or 4 digit number):') !!}
                    {!! Form::text('cvc', '123', ['class'=> 'form-control','required'=> 'required','data-stripe'=> 'cvc','data-parsley-type'=> 'number','data-parsley-trigger'=>'change focusout','maxlength'=> '4','data-parsley-class-handler'=> '#ccv-group']) !!}
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group" id="exp-m-group">
                            {!! Form::label('expMonth', 'Ex. Month') !!}
                            {!! Form::selectMonth('expMonth', 11, ['class'=> 'form-control','required'              => 'required','data-stripe'=> 'exp-month'],'%m') !!}
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="form-group" id="exp-y-group">
                            {!! Form::label('expYear', 'Ex. Year') !!}
                            {!! Form::selectYear('expYear', date('Y'), date('Y') + 10, null, ['class'=>'form-control',$required,'data-stripe'=>'exp-year']) !!}
                        </div>
                    </div>
                </div>
            </div>
 @include('front/common/terms')
 {!! Form::hidden('grandTotal',$sum) !!}
                        {!! Form::close() !!}  
                        <!--
                        <div class="order-cont order-cont2">
                            <span class="order-total-head">Additional Informatio</span>
                            <span class="order-total-descrp">Shipping costs and taxes will be evaluated 
    during checkout</span>
                                                    
                            <form action="#">
                                                    <ul>
                                    <li><input type="text" placeholder=""></li>
                                    <li><input type="submit" value="Add Message"></li>
                            </ul>
                            </form>
                            
                        </div>
                        -->
                    </div>       

                </div>

        </div>

    </div>
</div>

<script>

    $("#is_shipping_different").on("change", function () {
        if ($("#is_shipping_different").is(':checked')) {
            $("#shipping_information").show();
        } else
        {
            $("#shipping_information").hide();
        }

    });
</script>

<script>

    $('#form').submit(function (event) {

        $('.terms-errors').hide();
        $('.payment-errors').hide();


        var term = check_terms_services();
        
        if (term === false) {
            return false;
        }

        var form = $('#form');
        form.find('#place_order').prop('disabled', true);
        Stripe.card.createToken(form, stripeResponseHandler);

        return false;
    });


    function stripeResponseHandler(status, response) {
        var form = $('#form');
        // alert(response.error.type);
        if (response.id) {
            var token = response.id;
            form.append($('<input type="hidden" name="stripeToken" />').val(token));
            form.get(0).submit();
        } else {
            $('.payment-errors').show();
            $('.payment-errors').text(response.error.message);
            $('.payment-errors').addClass('alert alert-danger');


            var scrollPos = $("#form").offset().top;
            $(window).scrollTop(scrollPos);
            // $('.payment-errors').focus();
            form.find('#place_order').prop('disabled', false);
            return false;

        }

    }

    /*
     $('#form').on('submitted', function () {
     // do anything here...
     });
     */
   
</script>
@endsection

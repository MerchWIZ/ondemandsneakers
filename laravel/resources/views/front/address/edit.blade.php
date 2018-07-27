@extends('customer')
@section('content')
<?php
    $required = 'required';
?>
<section class="dashboard-area">
    <div class="container">
        <div class="dash__lft col-sm-3">
            <div class="dash__tabs">
    @include('front/common/left')
            </div>
        </div>
        <div class="dash__rgt col-sm-9">

                <div id="profile">
                <div class="profile__dtl col-sm-12">
                    <div class="flash-message">
                                @if (count($errors->register) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->register->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                @if (Session::has('success'))
                                <div class="alert alert-success">
                                    <h4><i class="icon fa fa-check"></i> &nbsp  {!! session('success') !!}</h4>
                                </div>
                                @endif
                    </div>
                 <form method="post" action="<?php echo url('updateaddress');?>">
                        <div class="profile__info">

                        <div class="form-group col-sm-12">
                        {!! Form::label('Address Line 1 *') !!}
                        {!! Form::text('address', isset($address->address) ? $address->address : null  , array('placeholder'=>"Address Line 1 *",'class' => 'form-control',$required) ) !!}
                        </div>

                        <div class="form-group col-sm-12">
                        {!! Form::label('Address Line 2') !!}
                        {!! Form::text('address2', isset($address->address2) ? $address->address2 : null  , array('placeholder'=>"Address Line 2",'class' => 'form-control') ) !!}
                        </div>

                        <div class="form-group col-sm-6">
                        {!! Form::label('country', 'Country *') !!}
                        <select name="country" id="country" class="form-control">
                            <option >Country *</option>
                         @foreach($countries as $country)
                            <option value="{{ $country->id }}"
                                    @if($country->id== $address->country) selected= selected @endif > {{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>

                        <div class="form-group col-sm-6">
                        {!! Form::label('state') !!} *
                        <select name="state" id="state" <?php echo $required; ?> class="form-control">
                            <option >State *</option>
                            @foreach ($states as $state)
                            <option value="{{ $state->code }}"
                                    @if($state->code== $address->state) selected= selected @endif > {{ $state->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('city','City *') !!}
                        {!! Form::text('city', isset($address->city) ? $address->city : null , array('placeholder'=>"City *",'class' => 'form-control',$required) ) !!}
                    </div>

                    <div class="form-group col-sm-6">
                        {!! Form::label('zip') !!} *
                        {!! Form::text('zip', isset($address->zip) ? $address->zip : null , array('placeholder'=>"Postal Code / Zipcode *",'class' => 'form-control',$required) ) !!}
                    </div>
                    </div>

                    <div class="form-group fit__sub__reset clrlist col-sm-12">
                     {!! Form::hidden('address_id', isset($address->id) ? $address->id : null ) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="fit__submit">Update</button>
                    <button type="button" class="fit__reset" onclick="back()">Back</button>
                    </div>

                 </form>       
                    </div>
                </div>

        </div>
    </div>
</div>
</section>  

@endsection
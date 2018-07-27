@extends('customer')
@section('content')
<?php
$required = 'required';
?>
<section class="dashboard-area">
    <div class="container">
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
        <div class="dash__lft col-sm-3">
            <div class="dash__tabs">
                @include('front/common/left')
            </div>
        </div>
        <div class="dash__rgt col-sm-9">
            <div class="tab-content">
                <div id="profile" class="tab-pane fade active in">
                    <div class="profile__dtl col-sm-12">

                        {!! Form::model($user, ['files' => true,'class' => 'form','url' => ['updateprofile'], 'method' => 'post']) !!}
                        <div class="form-group col-sm-4">
                            {!! Form::label('First Name') !!}
                            {!! Form::text('firstName', null , array('class' => 'form-control',$required) ) !!}
                        </div>
                        <div class="form-group col-sm-4 ">
                            {!! Form::label('Middle Name') !!}
                            {!! Form::text('middleName', null , array('class' => 'form-control',$required) ) !!}
                        </div>
                        <div class="form-group col-sm-4 ">
                            {!! Form::label('Last Name') !!}
                            {!! Form::text('lastName', null , array('class' => 'form-control',$required) ) !!}
                        </div>

                        <div class="form-group col-sm-12">
                            {!! Form::label('email') !!}
                            {!! Form::text('email', null , array('class' => 'form-control',$required) ) !!}
                        </div>

                        <div class="form-group clrhm col-sm-12">
                            <h5>{!! Form::label('gender', 'Gender *') !!}</h5>
                            <div class="inline-form">
                                {!! Form::radio('gender', 'm', true) !!}
                                {!! Form::label('Male', 'Male') !!}
                                {!! Form::radio('gender', 'f') !!}
                                {!! Form::label('Female', 'Female') !!}
                            </div>
                        </div>

                        <div class="form-group col-sm-6">
                            {!! Form::label('phone') !!} *
                            {!! Form::text('phone', isset($address->phone) ? $address->phone : null , array('placeholder'=>"Phone *",'class' => 'form-control',$required) ) !!}
                        </div>
                        {!! Form::hidden('address_id', isset($address->id) ? $address->id : null ) !!}



                        <div class="col-md-12 fit__sub__reset clrlist">
                            {!! Form::hidden('address_id', isset($address->id) ? $address->id : null ) !!}
                            <button type="submit" class="fit__submit">Update</button>
                            <button type="button" class="fit__reset" onclick="back()">Back</button>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>



            </div>
        </div>
    </div>
</section>  
@endsection
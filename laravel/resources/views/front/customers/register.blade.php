<style>
    .field {
        color: #fff;
        /* background-color: #FF0000; */
        height: 41px;
        width: 80%;
        border-radius: inherit;
        /* border: solid 1px #434343; */
        /* padding: 8px 10px; */
        cursor: pointer;
    }
</style>    

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
<div class="row">
    <div class="form-group col-sm-4">
        <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name" required="required" value="{{ old('firstName') }}">
    </div>
    <div class="form-text col-sm-4">
        <input type="text" class="form-control" name="middleName" id="midName" placeholder="Middle Name" required="required" value="{{ old('middleName') }}">
    </div>
    <div class="form-group col-sm-4">
        <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Last Name" required="required" value="{{ old('lastName') }}">
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-12">
        <input type="email" class="form-control" name="email" id="email" placeholder="Email Address *" required="required" value="{{ old('email') }}">
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
        <input type="password" class="form-control" name="password" id="password" placeholder="Password *" required="required">
    </div>
    <div class="form-text col-sm-6">
        <input type="password" class="form-control" data-match-error="Whoops, these don't match" data-match="#password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password *" required="required">
    </div>
</div>
@if(!($role_id == 4))
<div class="row">
    <div class="form-group col-sm-6">
        <input type="text" class="form-control" name="height" id="height" placeholder="Height *" required="required" value="{{ old('height') }}">
    </div>
    <div class="form-text col-sm-6">
        <input type="text" class="form-control" name="weight" id="weight" placeholder="Weight *" required="required" value="{{ old('weight') }}">
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
        <input type="text" class="form-control" name="medicalConcerns" id="medicalConcerns" placeholder="Medical Concerns" required="required" value="{{ old('medicalConcerns') }}">
    </div>
    <div class="form-text col-sm-6">
        <input type="text" class="form-control" name="goals" id="goals" placeholder="Goals" required="required" value="{{ old('goals') }}">
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-12">
        <label>Date of birth *</label>
    </div>
</div>    
<div class="row">
    <div class="form-group fnc-select col-sm-4">
        {!! Form::selectRange('date',1,31,null,['class' => 'form-control',$required]) !!}
    </div>
    <div class="form-group fnc-select col-sm-4">
        {!! Form::selectMonth('month',null, ['class' => 'form-control',$required]) !!}
    </div>
    <div class="form-group fnc-select col-sm-4">
        {!! Form::selectRange('year',2016,1930,null,['class' => 'form-control',$required])!!}
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-1">
        <input type="checkbox" name="isCompetitor" id="isCompetitor"> Yes
    </div>
    <div class="form-group col-sm-11">
        <input type="text" class="form-control" placeholder="Are you a competitor?" readonly="readonly">
    </div>
</div>

<div class="row" id="div_federation" style="display:none;">
    <div class="form-group col-sm-12" >
        <input type="text" class="form-control federation" name="federation" id="federation" placeholder="If so, which Federation?" required="required">
    </div>
</div>
@endif


<div class="row">
    <div class="form-group col-sm-12">
        <label class="inline">
            Gender *
        </label>
        <label class="radio-inline">
            <input type="radio" name="gender" value="m">Male
        </label>
        <label class="radio-inline">
            <input type="radio" name="gender" value="f">Female
        </label>   
    </div>        
</div>



<div class="row">
    <div class="form-group col-sm-12">
        <input type="text" class="form-control" name="address" id="address" placeholder="Your Address Line 1 *" required="required" value="{{ old('address') }}">
    </div>
</div>
<div class="row">
    <div class="form-group col-sm-12">
        <input type="text" class="form-control" name="address2" id="address" placeholder="Your Address Line 2 *" required="required" value="{{ old('address2') }}">
    </div>
</div>

<div class="row">
    <div class="form-group col-sm-6">
        <input type="text" class="form-control" name="country" value="230" readonly="readonly">
    </div>
    <div class="form-group fnc-select col-sm-6">
        <select class="form-control" name="state" id="stateRegion">
            <option value="">State / Region</option>
            <option value="New York">New York</option>
            <option value="Washington DC">Washington DC</option>
            <option value="Los Angeles">Los Angeles</option>
        </select>
    </div>

</div>

<div class="row">
    <div class="form-group fnc-select col-sm-6">
        <select class="form-control" id="city" name="city">
            <option value="">City</option>
            <option value="New York">New York</option>
            <option value="Washington DC">Washington DC</option>
            <option value="Los Angeles">Los Angeles</option>
        </select>
    </div>
    <div class="form-group col-sm-6">
        <input type="text" class="form-control" name="zip" id="zip" placeholder="Zip Code" value="{{ old('zip') }}">
    </div>
</div>

<div class="row">
    <div class="form-group fnc-select col-sm-6">
        <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone *" value="{{ old('phone') }}">
    </div>
</div>


<div class="row">
    <div class="form-group col-sm-12">  
        @include('front/common/terms')
    </div>
</div>

<div class="reg__photos text-center col-sm-12 p0 clrlist">
    <button type="submit" class="btn btn-default reg__submit__btn" id="register_button">Register</button>
</div>

<script>
    $("#isCompetitor").change(function () {
        //  alert(this.checked);
        if (this.checked) {
            //Do stuff
            $('#div_federation').show();
            $('.federation').addClass('required');
        } else {
            $('#div_federation').hide();
            $('.federation').removeClass('required');
        }
    });

    $('.register').submit(function (event) {

        var form = $('#register');
        form.find('#register_button').prop('disabled', true);

        $('.terms-errors').hide();
        var term = check_terms_services();

        if (term === false) {
            return false;
        }
        return true;
    });

</script>
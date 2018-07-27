@extends('customer')
@section('content')
<?php
$required = 'required';
?>
<style>
    .btn-file {
        position: relative;
        overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

    #img-upload{
        width: 100%;
        height: 100%;
    }

</style>
<section class="dashboard-area">
    <div class="container">
        <div class="dash__lft col-sm-3">
            <div class="dash__tabs">
                @include('front/common/left')
            </div>
        </div>
        <div class="dash__rgt col-sm-9">
            <div class="tab-content">
                <div id="profile" class="tab-pane fade active in">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

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
<div class="profile__photo col-sm-6">
                        <div class="profile__photo__inr">
                            <img id='img-upload' src="{{ asset('/uploads/users/')}}/<?php echo $user->image; ?>" alt="{{$user->firstName}} {{$user->middleName}} {{$user->lastName}}">
                        </div>
                        {!! Form::open(array('files' => true,'class' => 'form','url' => 'changeprofileimage', 'method' => 'post')) !!}
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <span class="btn btn-primary  btn-file">
                                        Change Profile Image <input type="file" name="image" id="imgInp">

                                    </span>
                                    <input type="submit" name="submit" class="btn btn-success pull-right" value="Upload">
                                </span>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  

<script>

    $(document).ready(function () {
        $(document).on('change', '.btn-file :file', function () {
            var input = $(this),
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function (event, label) {

            var input = $(this).parents('.input-group').find(':text'),
                    log = label;

            if (input.length) {
                input.val(log);
            } else {
                //  if (log)
                //.  alert(log);
            }

        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function () {
            readURL(this);
        });
    });
</script>
@endsection
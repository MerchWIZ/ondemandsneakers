<?php
$required="required";
?>
@include('admin/commons/errors')
<div class="form-group">
    {!! Form::label('Name') !!}
    {!! Form::text('name', null , array('class' => 'form-control',$required) ) !!}
</div>
<div class="form-group">
    {!! Form::label('category') !!}
    {!! Form::select('cat_id', $categories,null,['class' => 'form-control','name'=>'cat_id']) !!}
</div>

<div class="form-group">
    {!! Form::label('Upload File') !!}
    {!! Form::file('image', null,
    array('class'=>'form-control')) !!}
</div>
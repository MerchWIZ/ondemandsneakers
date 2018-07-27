<?php
$required = "required";
?>
@include('admin/commons/errors')
<div class="form-group">
    {!! Form::label('name') !!}
    {!! Form::text('name', null , array('class' => 'form-control',$required) ) !!}
</div>
<div class="form-group">
    {!! Form::label('sku') !!}
    {!! Form::text('sku', null , array('class' => 'form-control',$required) ) !!}
</div>
<div class="form-group">
    {!! Form::label('Categories') !!}
    {!! Form::select('categories', $categories,$productsCategories,['class' => 'form-control select','name'=>'categories[]','multiple'=>'multiple','id'=>'categories']) !!}
</div>

<div class="form-group">
    {!! Form::label('attibutes') !!}
    {!!Form::select('attibutes',$attributes,$productAttributes,array('class' => 'form-control select','multiple'=>'multiple','name'=>'attributes[]'))!!}
</div>

<div class="form-group">
    {!! Form::label('Url(Key)') !!}
    {!! Form::text('key',$url, array('class' => 'form-control',$required)) !!}
</div>

<!--<br clear='all'/><br clear='all'/>-->
<div class="form-group">
    {!! Form::label('Short Description') !!}
    {!! Form::text('teaser', null , array('class' => 'form-control') ) !!}
</div>

<div class="form-group">
    {!! Form::label('description') !!}
    {!! Form::textarea('description', null, ['size' => '105x3','class' => 'form-control ckeditor',$required]) !!} 
</div>

<div class="form-group">
    {!! Form::label('price') !!}
    {!! Form::text('price', null , array('class' => 'form-control',$required) ) !!}
</div>

<div class="form-group">
    {!! Form::checkbox('sale',1,false,['id'=>'sale']); !!}
    Sale This Product. 
</div>

<div class="form-group">
    {!! Form::label('Sale Price') !!}
    {!! Form::text('salePrice', null , array('class' => 'form-control') ) !!}
</div>

<div class="form-group">
    {!! Form::label('keywords') !!}
    {!! Form::text('keywords', null , array('class' => 'form-control') ) !!}
</div>

<div class="form-group">
    {!! Form::label('image') !!}
    {!! Form::file('image', null,array($required,'class'=>'form-control')) !!}
    *Image dimensions should be 665 X 570 for best results
</div>

<div class="form-group">
    <div class="col-sm-4">
        <button type="submit" value="products" class="btn btn-primary btn-block btn-flat">Save</button>
    </div>
    <div class="col-sm-4">
        <a href="{{ url('admin/products')}}" class="btn btn-warning btn-block btn-flat">Cancel</a>
    </div>
</div>
<script>
    $(document).ready(function () {
        $(".select").select2();
    });
</script>
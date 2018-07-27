<div class="form-group">
   {!! Form::label('name') !!}
		{!! Form::text('name', null , array('class' => 'form-control','required') ) !!}
</div>
<div class="form-group">
   {!! Form::label('price') !!}
		{!! Form::text('price', null , array('class' => 'form-control','required') ) !!}
</div>
{!! Form::hidden('attribute_id',$attribute_id) !!}


<div class="form-group">
    <div class="col-sm-4">
        <button type="submit" value="products" class="btn btn-primary btn-block btn-flat">Save</button>
    </div>
    <div class="col-sm-4">
        <a href="{{ url('admin/attributes')}}" class="btn btn-warning btn-block btn-flat">Cancel</a>
    </div>
</div>
@extends('admin/admin_template')

@section('content')
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Subscribers( Total : {{ count($newsletter) }} )</h3>
            </div>
            <!-- /.box-header -->
			<div class="flash-message">
			@foreach (['danger', 'warning', 'success', 'info'] as $msg)
			@if(Session::has('alert-' . $msg))

			<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
			@endif
			@endforeach
			</div> <!-- end .flash-message -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Action</th>
                </tr>
                <?php $i = 1;?>
                @foreach($newsletter as $news)
                <tr>
                <td><?php echo $i;
                    $i++; ?></td>
                <td>{{$news->name}}</td>
                <td>{{$news->email}}</td>
                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal-{{ $news->id }}"><i class="fa fa-remove"></i> Delete</button></td>
				<div class="modal fade" id="myModal-{{ $news->id }}">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" style="color: red">Alert</h4>
				</div>
				<div class="modal-body">
				<h3>Are you sure do you want to delete this?</h3>
				</div>
				<div class="modal-footer">
				<a class="btn btn-danger pull-left" href="delete/<?php echo $news->id ?>">Yes</a>

				<button type="button" class="btn btn-success pull-left" data-dismiss="modal">No</button>
				</div>
				</div>
				<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
				</div>
				<!-- /.modal -->

                </tr>

                @endforeach
              </table>
              <?php echo $newsletter->render(); ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
@endsection
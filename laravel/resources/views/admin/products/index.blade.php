@extends('admin/admin_template')

@section('content')


<!-- Main row -->
<div class="row">
    <!-- Left col -->
    <div class="col-md-12" >
        <!-- PRODUCT LIST -->
        <div class="box-body table-responsive no-padding">

            <div class="box box-info">
                <div class="box-header with-border">
                    <div class="box-header with-border">
                        <h3 class="box-title">Products( Total : {{ count($products) }} ) </h3>

                        <div class="box-tools pull-right">
                            <a class="btn btn-sm btn-info btn-flat" href="{{url('admin/products/create')}}">Add new product</a>

                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th> </th>
                                    <th>Product ID</th>
                                    <th>SKU</th>
                                    <th>Title</th>
                                    <th>Added</th>
                                    <th>Short Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $row)
                                <tr>
                                    <td><img height="70px" src="{{ asset('uploads/products/thumbnail')}}/<?php echo $row->image; ?>" alt="<?php echo $row->name; ?>" /></td>
                                    <td><a href="products/edit/<?php echo $row->id ?>" class="product-title"><?php echo $row->id; ?></a></td>
                                    <td><a href="products/edit/<?php echo $row->id ?>" class="product-title"><?php echo $row->sku; ?></a></td>
                                    <td><a href="products/edit/<?php echo $row->id ?>" class="product-title"><?php echo $row->name; ?></a></td>
                                    <td><?php echo $row->created_at; ?></td>
                                    <td><?php echo $row->teaser; ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-warning btn-flat"  href="productsimages/manage/<?php echo $row->id ?>" >Manage Images</a>
                                        <a class="btn btn-sm btn-danger btn-flat"  href="products/delete/<?php echo $row->id ?>" >Delete</a>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                </div>
                <!-- /.box-footer -->
            </div>

        </div>
    </div>
</div>

@endsection
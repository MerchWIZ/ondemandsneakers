@extends('admin/admin_template')

@section('content')
<?php

$currency = Config::get('params.currency');
$orderPrefix = Config::get('params.order_prefix');
$per_month = Config::get('params.per_month');
?>
<style>
    img {
        height: 275px;
        width: 100%;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if(Session::has('alert-' . $msg))

            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
            @endif
            @endforeach
        </div> <!-- end .flash-message -->

        <div class="box box-primary">

            <?php
            $user = $data[0];
            ?>        
            @if($user->status == '1')
            <div class="box-body bg-success">
                @else
                <div class="box-body bg-danger">
                    @endif
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="col-sm-12">
                                @if($data[0]->image == '')
                                <img  src="{{ url('front/images/usr.jpg')}}" alt="User Avatar">
                                @else
                                <img src="{{ url('uploads/users/'.$data[0]->image) }}" alt="User Avatar" style="">
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="box-header with-border">
                                <h3 class="box-title"> Customer's Information ( @if($data[0]->role_id == 2) Athlete @else Ambassador @endif )</h3>
                            </div>
                            <ul>
                                <li>First Name :{{ $data[0]->firstName }}</li>
                                <li>Middle Name :{{ $data[0]->middleName }}</li>
                                <li>Last Name :{{ $data[0]->lastName }}</li>
                                <li>DOB: {{$data[0]->dob }}</li>
                                <li>Gender: @if($data[0]->gender == 'f') Female @else Male @endif </li>
                                <li>Email: {{ $data[0]->email }}</li>
                                <li>Height: {{ $data[0]->height }}</li>
                                <li>Weight: {{ $data[0]->weight }}</li>
                                <li>Medical Concerns: {{ $data[0]->medicalConcerns }}</li>
                                <li>Goals: {{ $data[0]->goals }}</li>
                                <li>Experience: @if($data[0]->experience == '') Not Mentioned Yet @else {{ $data[0]->experience }}+ @endif </li>
                                <li>Member Since: {{ date('d M Y',strtotime($data[0]->created_at))}}</li>
                            </ul>
                        </div>
                        <div class="col-sm-4">
                            <div class="box-header with-border">
                                <h3 class="box-title"> Address Information</h3>
                            </div>
                            <ul>
                                <li>Address :{{ $data[0]->address }}</li>
                                <li>Address 2:{{ $data[0]->address2 }}</li>
                                <li>Phone :{{ $data[0]->phone }}</li>
                                <li>Mobile :{{ $data[0]->mobile }}</li>
                                <li>Country: {{ $data[0]->country }}</li>
                                <li>State: {{ $data[0]->state }}  </li>
                                <li>City: {{ $data[0]->city }}</li>
                                <li>Zip Code: {{ $data[0]->zip }}</li>
                            </ul>
                            <div class="col-sm-8">
                                <h4>Date of Next Show:</h4>
                            </div>
                            <div class="col-sm-4">
                                <h4 class="bg-info">@if(is_null($shows)) No Date @else {{ date('d/m/Y', strtotime($shows->date)) }}@endif</h4></div>
                        </div>
                    </div>
                    @include('admin/commons/users_action')
                </div>
            </div>
        </div>
        @if($data[0]->role_id == 2)
        @include('admin.client_athlete')
        @elseif($data[0]->role_id == 3)
        @include('admin.client_ambassador')
        @endif
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">( Total Subscriptions : {{ count($subscriptions) }} ) </h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>

                    </div>
                </div>
                <div class="box-body">
                    <ul class="products-list product-list-in-box">
                        @if(count($subscriptions)>0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Name</td>
                                    <td>Date</td>
                                    <td>Fee</td>
                                    <td>Status</td>                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach($subscriptions as $row)
                                <tr>
                                    <td><?php
                                        echo $i;
                                        $i++;
                                        ?></td>
                                    @if($data[0]->id == $row->athlete_id)
                                    <td><a href="{{ url('admin/client/'.$row->ambassador_id) }}" class="product-title">{{ $row->ambassador }}</a></td>
                                    @else
                                    <td><a href="{{ url('admin/client/'.$row->athlete_id) }}" class="product-title">{{ $row->athlete }}</a></td>
                                    @endif
                                    <td>{{ date("d/m/Y", strtotime($row->subscriptionDate)) }}</td>
                                    <td><?php echo $currency[Config::get('params.currency_default')]['symbol'] ?> {{ $row->subscriptionRate }} {{$per_month}}</td>
                                    <td>@if($row->subscriptionStatus == 1)<span class="bg-success">SUBSCRIBED</span>@elseif($row->subscriptionStatus == 2)<span class="bg-warning">UNSUBSCRIBED</span>@endif</td>

                                </tr>
                                @endforeach 
                            </tbody>

                        </table>
                        @else
                        <div class="bg-warning">Sorry, there is no subscription added yet </div>
                        @endif
                    </ul>
                </div>
            </div>
        </div>                                      
        <!--    <div class="col-md-12">
                 PRODUCT LIST 
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">( Total Orders : {{ isset($orders)?count($orders):0 }} ) </h3>
        
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
        
                        </div>
                    </div>
                     /.box-header 
        <?php if (isset($orders) && !empty($orders)) { ?>
                                                                                                                                                                                        <div class="box-body">
                                                                                                                                                                                            <ul class="products-list product-list-in-box">
                                                                                                                                                                        
                                                                                                                                                                                                <table class="table" id="order_table">
                                                                                                                                                                                                    <thead>
                                                                                                                                                                                                    <tr>
                                                                                                                                                                                                    <td>Order Id</td>
                                                                                                                                                                                                    <td>Name</td>
                                                                                                                                                                                                    <td>Added</td>
                                                                                                                                                                                                    <td>Status</td>
                                                                                                                                                                                                    <td>Total</td>
                                                                                                                                                                                                    <td></td>                                    
                                                                                                                                                                                                    </tr>
                                                                                                                                                                                                    </thead>
                                                                                                                                                                                                    <tbody>
                                                                                                                                                                                                    @foreach($orders as $order)
                                                                                                                                                                                                    <tr>
                                                                                                                                                                                                    <td><?php echo $orderPrefix; ?>{{$order->id}}</td>
                                                                                                                                                                                                    <td>{{ $order->firstName.' '.$order->lastName }}</td>
                                                                                                                                                                                                    <td>{{ date('d M Y',strtotime($order->created_at))}}</td>
                                                                                                                                                                                                    <td>{{ ucfirst($order->orderStatus)}}</td>
                                                                                                                                                                                                    <td>{{ $currency[Config::get('params.currency_default')]['symbol']}}{{ $order->grandTotal}}</td>
                                                                                                                                                                                                    <td><a href="{{ url('admin/order')}}/{{$order->id}}">Detail</a></td>                                    
                                                                                                                                                                                                    </tr>
                                                                                                                                                                                                    @endforeach 
                                                                                                                                                                                                    </tbody>
                                                                                                                                                                        
                                                                                                                                                                                                </table>
                                                                                                                                                                                                <div id="warning_message" ></div>
                                                                                                                                                                                                <div class="loader" style="display: none;">Loading...</div>
                                                                                                                                                                                            </ul>
                                                                                                                                                                                        </div>
        <?php } ?>
                     /.box-body 
                    <div class="box-footer text-center">
                        <a href="javascript::;" class="uppercase"></a>
                    </div>
                     /.box-footer 
                </div>
            </div>-->
        <!-- /.col -->



    </div>



    @endsection

@extends('layout')
@section('content')
<?php
$currency = Config::get('params.currency');
$orderPrefix = Config::get('params.order_prefix');
?>
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
                    <div ><h2>Your Orders</h2></div>
                <table id="example" class="table table-area0 table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <td>Id</td>
                            <td>Status</td>
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
                            <td>{{ $order->status }}</td>
                            <td>{{ date('d M Y h:i a',strtotime($order->created_at))}}</td>
                            <td><div class="btn btn-warning btn-{{ ucfirst($order->orderStatus)}} ">{{ ucfirst($order->orderStatus)}}</div>
							
							</td>
                            <td>{{ $currency[Config::get('params.currency_default')]['symbol']}}{{ $order->grandTotal}}</td>
                            <td><a class="btn" href="order/{{$order->id}}">Detail</a></td>                                    
                        </tr>
                        @endforeach 
                    </tbody>
                </table>
                    </div>
            </div>
        </div>
    </div>
</section>

@endsection
@extends('layout')
@section('content')
<?php
$currency = Config::get('params.currency');
$orderPrefix = Config::get('params.order_prefix');
?>
<section class="dashboard-area">
    <div class="tab-content">
        <div id="profile" class="tab-pane fade active in">
            <div class="container">
                <div class="dash__lft col-sm-3">
                    <div class="dash__tabs">
                        @include('front/common/left')
                    </div>
                </div>
                <div class="dash__rgt col-sm-9">
                    <h3>Order Information</h3>

                    <ul>
                        <li><strong>Order ID:</strong> <?php echo $orderPrefix; ?>{{$order->id}}</li>
                        <li><strong>Email:</strong> {{$order->email}}</li>
                        <li><strong>Order Status:</strong> {{ ucfirst($order->orderStatus)}}</li>
                        <li><strong>Order Date:</strong> {{ date("d M Y",strtotime($order->orderDate))}}</li>
                        <li><strong>Order Total:</strong> {{ $currency[Config::get('params.currency_default')]['symbol']}}{{ $order->grandTotal}}</li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6 col-md-6 main text-left">
                    <h3 class="head">Customer Information</h3>

                    <ul>
                        <li>
                            <strong>Name:</strong> {{$order->customerName}}
                        </li>
                        <li>
                            <strong>Gender:</strong> {{$order->gender}}
                        </li>
                        <li>
                            <strong>Country:</strong> {{$order->country}}
                        </li>
                        <li>
                            <strong>State:</strong> {{$order->state}}
                        </li>
                        <li>
                            <strong>City:</strong> {{$order->city}}
                        </li>
                        <li>
                            <strong>Zip:</strong> {{$order->zip}}
                        </li>
                        <li>
                            <strong>Phone:</strong> {{$order->phone}}
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>
<section class="test-bd-area" >
    <div class="container">
        <div class="check-left-sect">
            <div class="col-lg-12 col-md-12 main text-left">
                <div class="box-header with-border">
                    <h3 class="box-title">Test Summary</h3>
                </div>



                <table class="table table-bordered">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Image</th>
                            <th>Products</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sum = 0;
                        $i = 0;
                        ?>
                        @foreach ($order->products as $product)
                        <?php
                        $rowTotal = $product->price * $product->quantity;
                        $sum += $rowTotal;
                         
                        ?>
                        <tr>
                             <td>
                                 <img src="{{ asset('uploads/customize_products/small')}}/<?php echo $product->customized_image ?>" height="100px" width="100px" alt="<?php echo $product->name; ?>" />
                            </td>
                            <td>

                                <?php echo $product->name;
                                //print_r($product); die;
                                ?>
                            </td>
                           
                            <td><span >{{ $currency[Config::get('params.currency_default')]['symbol']}}<?php echo $product->price ?></span></td>

                        </tr>
                        @endforeach
                        
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<section class="test-bd-area" >
    <div class="container">
        <div class="check-left-sect">
            <div class="col-lg-12 col-md-12 main text-left">
                <div class="box-header with-border">
                    <h3 class="box-title">Results</h3>
                </div>
                @if(count($results)>0)
                <table class="table table-bordered">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Result ID</th>
                            <th>Title</th>
                            <th>Remarks</th>
                            <th>Last Email Sent</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                         @if(1 ==2)
                        @foreach ($results as $result)
                        <tr>
                            <td><?php echo $result->id; ?></td>
                            <td><?php echo $result->title; ?></td>
                            <td><?php echo $result->remarks; ?></td>
                            <td><?php echo $result->lastEmail; ?></td>
                            <td><a href="{{url('uploads/orders/results')}}/{{$result->file}}" class="btn-sm btn-info"> View Report</a></td>
                        </tr>
                        @endforeach
                        
                        @endif


                    </tbody>
                </table>
                @else
                <div class="alert alert-danger alert-dismissible">No result uploaded yet.</div>
                @endif
            </div>    
        </div>    
    </div>
</section>
@endsection
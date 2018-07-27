@extends('layout')

@section('content')
<div id="fh5co-contact" class="__web-inspector-hide-shortcut__">
    <div class="container">
        <?php
        $currency = Config::get('params.currency');
        ?>
        <div class="row">
            <div class="container-fluid">
                <div class="checkout-back">
                    @if (count($cart)==0)
                    <div class="alert alert-success">
                        <h4><i class="icon fa fa-check"></i> &nbsp  Your Basket is empty</h4>
                    </div>
                    @endif
                    @if (count($cart)>0)
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div class="check-left-sect">
                            <form id="cart_update" name="cart_update"  action="update" >
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>Products</td>
                                            <td>Delete</td>
                                            <td>Qty</td>
                                            <td>Single</td>
                                            <td>Total</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sum = 0;


                                        ?>
                                        @foreach ($cart as $product)
                                        <?php
                                       // print_r($product->cart_customized_image); die;
                                        $rowTotal = $product->total_price * $product->quantity;
                                        $sum+=$rowTotal;
                                        ?>
                                        <tr>
                                            <td>
                                                <?php
                                                if ($product->simpleProduct == 0) {
                                                    ?>
                                                
                                                
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel"><?php echo $product->product_name; ?></h4>
      </div>
      <div class="modal-body">
          <div class="modal__img">
            <img id="modal_image" src="" alt="<?php echo $product->product_name; ?>" />
          <div>
          <div id="caption"></div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

                                                
                                                
                                                <!--<a download="<?php echo $product->cart_customized_image ?>" target="_blank" href="{{ asset('uploads/customize_products/large')}}/<?php echo $product->cart_customized_image ?>" title="ImageName">Download Large File</a>-->
                                                    <div class="checkout-img clrlist">
                                                        <ul>
                                                            <li><a data-toggle="modal" data-target="#myModal">
                                                                    <img id="<?php echo $product->cart_customized_image ?>" src="{{ asset('uploads/customize_products/small')}}/<?php echo $product->cart_customized_image ?>" height="100px" width="100px" alt="<?php echo $product->product_name; ?>" /></a></li>
                                                                    <li><a class="btn btn-info" id="<?php echo $product->cart_customized_image ?>" data-toggle="modal" onclick="showModal(this)">View Enlarge</a></li>
                                                        </ul>         
                                                    </div>
                                                    <?php
                                                } else {
                                                    echo $product->product_name;
                                                }
                                                ?>
                                                <br clear="all" />
                                            </td>
                                            <td><div class="trash-icon"><a href="{{url('/cart/delete').'/'}}<?php echo $product->cart_id ?>"><i class="fa fa-trash fa-2x"></i></a></div></td>
                                            <td><input size="1" class="form-control qty-txt" name="qty[<?php echo $product->cart_id ?>]" value="<?php echo $product->quantity ?>" maxlength="2" /></td>
                                            
                                           <td><span class="txt-price">{{ $currency[Config::get('params.currency_default')]['symbol']}} <?php echo $product->total_price ?></span></td>
                                            <td><span class="txt-price">{{ $currency[Config::get('params.currency_default')]['symbol']}} <?php echo $rowTotal; ?></span></td>
                                        </tr>
                                        <tr>
                                            <td colspan=5 class="cart-dtl"><div class="cart_product_name">
                                                    <?php echo $product->product_name; ?>
                                                </div>
                                                <?php
                                                $attributes = explode(',', $product->attribute);
                                                $values = explode(',', $product->value);
                                                while (list($key, $attribute) = each($attributes) and list($key, $value) = each($values)) {
                                                    if ($value == '--')
                                                        continue;
                                                    ?>
                                                    <div class="cart_attribute_name">
                                                        <p ><?php echo $attribute; ?> : <?php echo $value ?></p>
                                                    </div>
                                                    <?php
                                                }
                                                ?></td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
								<div class="clrlist">
								
                                <ul class="checkout-btm-lnks signalized--hover">
                                    <li><a class="btn btn-primary " href="{!! url('/') !!}"><i class="fa fa-arrow-right"></i> <span>Continue Shoping</span></a></li>
                                    <li><a class="btn btn-primary"  href="{!! url('/') !!}"<i class="fa fa-refresh"></i> <span>Update Cart</span></a></li>
                                    <li><a class="btn btn-primary"  href="{!! url('checkout') !!}"><i class="fa fa-shopping-cart"></i> <span>Proceed to checkout</span></a></li>
                                </ul>
								</div>
                            </form >
                        </div>

                        <table width="100%" border="0" id="cart_upselling"><tbody>

                                @foreach ($products as $product)
                                <tr>
                                    <td></td>
                                    <td>
                                        <?php echo $product->name ?>
                                        <form action="../cart/addsimple" method="get">
                                            <input type="hidden" name="total_price" value="<?php echo $product->price ?>">
                                            <input type="hidden" name="return" value="cart/view"/>
                                            <input type="hidden" name="price"  id="price" value="<?php echo $product->price; ?>" />
                                            <input type="hidden" name="quantity" value="1"/>
                                            <input type="hidden" name="product_id"  id="product_id" value="<?php echo $product->id; ?>" />							
                                            <p><strong>{{ $currency[Config::get('params.currency_default')]['symbol']}}<?php echo $product->price ?></strong> &nbsp; 
                                                <input type="submit" class="button" value="Add to Cart"/></p>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody></table>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        @include('front/orders/right')

                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<script>

    function submitCart() {
        $('#cart_update').submit();
    }
    
function showModal(img){
       
var image_path = '{{ asset('uploads/customize_products/large')}}'+'/'+img.id;
var modalImg = document.getElementById('modal_image');
//var captionText = document.getElementById("caption");

    modalImg.src = image_path;
    $('#myModal').modal('show');
        }
</script>
@endsection

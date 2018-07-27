@extends('layout')

@section('content')
<?php
$currency = Config::get('params.currency');

if ($product->sale == 1 && $product->price > $product->salePrice) {
    $price = $product->salePrice;
} else {
    $price = $product->price;
}
?>

<div id="fh5co-programs-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <span class="main-head whole-sale-head prod-detail"><?php // echo $category->name;   ?></span>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <section class="slider">
                            <div id="slider" class="flexslider">
                                <div class="flex-viewport" style="overflow: hidden; position: relative;">
                                    <ul class="slides" style="width: 200%; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
                                        <li id="slide_0" class="flex-active-slide" style="width: 427px; margin-right: 0px; float: left; display: block;">
                                            <img  src="{{ asset('uploads/products')}}/<?php echo $product->image; ?>" draggable="false" />

                                        </li>

                                        <?php
                                        foreach ($productImages as $image) {
                                            ?>
                                            <li style="width: 427px; margin-right: 0px; float: left; display: block;">

                                                <img src="{{ asset('uploads/products_images')}}/<?php echo $image->image; ?>" draggable="false" /> 

                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>

                            <div id="carousel" class="flexslider">
                                <div class="flex-viewport" style="overflow: hidden; position: relative;">
                                    <ul class="slides" style="width: 200%; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
                                        <li class="flex-active-slide" style="width: 120px; margin-right: 5px; float: left; display: block;">
                                            <img  src="{{ asset('uploads/products/thumbnail')}}/<?php echo $product->image; ?>" draggable="false" />
                                        </li>
                                        <?php
                                        foreach ($productImages as $image) {
                                            ?>
                                            <li id="slide_<?php echo $image->attribute_value_id ?>"  style="width: 120px; margin-right: 5px; float: left; display: block;">

                                                <img src="{{ asset('uploads/products_images/thumbnail')}}/<?php echo $image->image; ?>" draggable="false" /> 

                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </section>
                        <!-- <div class="social-area">
                                <span class="share-txt">SHARE PRODUCT</span>
                            <ul class="share-list">
                                <li><a href="#"><img src="{{ asset('front/images/fb-share.png')}}" alt="facebook" /></a></li>
                                <li><a href="#"><img src="{{ asset('front/images/instagrem-share.png')}}" alt="instagrem" /></a></li>
                                <li><a href="#"><img src="{{ asset('front/images/pinterest-share.png')}}" alt="pinterest" /></a></li>
                            </ul>
                         </div>-->

                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="prod-detail-cont">
                            <span class="prod-deatil-head"><?php echo $product->name; ?></span>
                            <span class="prod-deatil-head"  >{{$currency[Config::get('params.currency_default')]['symbol']}} @include('front/products/price')</span>
                            <form id="form_add_to_cart" class="prod-detail-form">



                                <?php
                                if (!empty($availabeInColors)) {
                                    foreach ($availabeInColors as $color) {
                                        ?>

                                        <div class="hussain__radio">
                                            <input onclick="changeColor(), changePrice('attributes_14')" id="attributes_14_<?php echo $color->name; ?>" type="radio" name="attributes[14][]" class="color <?php echo $color->name; ?>" value="<?php echo $color->name; ?>_option_<?php echo $color->attribute_value_id; ?>_option_<?php echo $color->price; ?>" />
                                            <label><?php echo $color->name; ?></label>
                                        </div>
                                        <?php
                                    }
                                }

                                echo "<div class='clearfix'></div>";

                                foreach ($attributes as $attribute) {

                                    if ($attribute->type == 'dropdown') {
                                        echo "<label>Select " . $attribute->name . "</label>";
                                        ?> 

                                        <select onchange="changePrice('attributes_<?php echo $attribute->attribute_id ?>');"  id="attributes_<?php echo $attribute->attribute_id ?>" name="attributes[<?php echo $attribute->attribute_id ?>][]" >
                                            <option >--</option>
                                            <?php
                                            $values = explode(',', $attribute->value_names);
                                            sort($values);
                                            $value_ids = explode(',', $attribute->value_id);
                                            $value_prices = explode(',', $attribute->value_price);
                                            while (list($key, $value) = each($values) and list($vkey, $value_id) = each($value_ids) and list($pkey, $value_price) = each($value_prices)) {
                                                ?>
                                                <option value="<?php echo $value; ?>_option_<?php echo $value_id; ?>_option_<?php echo $value_price; ?>" ><?php echo $value; ?></option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <?php
                                    } elseif ($attribute->type == 'textfield') {
                                        echo "<label>Enter " . $attribute->name . "</label>";
                                        ?>
                                        <input value="" name="attributes[<?php echo $attribute->attribute_id ?>][]" id="attributes_<?php echo $attribute->attribute_id ?>"  />

                                        <?php
                                    }
                                }
                                ?>
                                Quantity
                                <input value="1" name="quantity" id="quantity"  />
                                <input type="button" id="btn_add_to_cart" value="Add to Cart" style="border-radius:2px;" />
                                <input type="hidden" name="total_price"  id="total_price" value="<?php echo $price; ?>" />
                                <input type="hidden" name="price"  id="price" value="<?php echo $price; ?>" />
                                <input type="hidden" name="product_id"  id="product_id" value="<?php echo $id; ?>" />
                            </form>


                            <script>



                                $(document).ready(function () {
                                    $("#btn_add_to_cart").click(function () {

                                        var price = $('#total_price').val();
                                        var form = $('#form_add_to_cart').serialize();

                                        console.log(form);

                                        var jqxhr = $.get("../cart/add", form, function () {
                                            alert( "Product added to cart." );
                                            window.location = "../cart/view";

                                        })
                                                .done(function () {
                                                    //alert( "second success" );
                                                })
                                                .fail(function () {
                                                    //alert( "error" );
                                                })
                                                .always(function () {
                                                    //alert( "finished" );
                                                });
                                    });


                                });

                                function changePrice(attribute_id)
                                {
                                    var value = $("#" + attribute_id).val();
                                    var price = $("#price").val();
                                    var form = $('#form_add_to_cart').serialize();
                                    //$("#description").html(total_price); 
                                    $.get("../cart/updateproductprice", form, function (response) {
                                        //alert( "Product added to cart." );
                                        //window.location="../cart/view";
                                        //alert(response);
                                        $("#total_price").val(response.total_price);
                                        $("#price").html(response.total_price);
                                        //$("#description").html(response.total_price);                  
                                    }, 'json')
                                }

                                var prev = 'slide_0';
                                function changeColor()
                                {
                                    var value = $("input:checked").val();
                                    var value = value.split("_");
                                    $("#slide_" + value[2]).trigger("click");
                                }
                            </script>
                        </div>
                    </div>
                </div>
                <span class="descrp-head" id="description">Description</span>
                <div class="detail-cont">
                    <span class="faq-top-head">Product Description</span>
                    <span class="prod-detail-descrp"><?php echo $product->description; ?></span>
                </div>
                <?php
                $products = $relatedProducts;
                ?>
                <span class="similar-prod">Similar Products</span>
                @include('front/products/list')
            </div>
        </div>

    </div>

</div>
@endsection



<?php

    $currency = Config::get('params.currency');
//        $environment = 'development';
    $environment = 'live';

    if ($product->sale == 1 && $product->price > $product->salePrice) {
        $price = $product->salePrice;
    } else {
        $price = $product->price;
    }
    ?> 


<form id="form_add_to_cart" class="prod-detail-form" action="{{ URL::to('/cart/addcustomizedesign') }}"
                              method="post">


						<div class="prodcolors fom-bdr / col-xs-12 bdr1 p10 mt-1">
						
							<div class="list-col-4 "><ul>
							
                            <?php
                          
                            if (!empty($availabeInColors)) {

                            foreach ($availabeInColors as $color) {
                            ?>
                                                                
						
                            <li class="prod__radio di black">
                                <input onclick="changeColor(), changePrice('attributes_14')"
                                       id="attributes_14_<?php echo $color->name; ?>" type="radio"
                                       name="attributes[14][]" class="color <?php echo $color->name; ?>"
                                       value="<?php echo $color->name; ?>_option_<?php echo $color->image; ?>_option_<?php echo $color->price; ?>"/>

                                <label for="attributes_14_<?php echo $color->name; ?>"><?php echo $color->name; ?></label>
                            </li>
                            <?php
                            }
                            }
						
                            echo "</ul></div><div class='clearfix'></div> <hr>";
                          
						  echo "<div class='clrlist di'><ul><li>";
                       
                            foreach ($attributes as $attribute) {

                            if ($attribute->type == 'dropdown') {
                            echo "<label>$attribute->name</label>";
                            ?>

                            <select  class="form-control wa" onchange="changePrice('attributes_<?php echo $attribute->attribute_id ?>');"
                                    id="attributes_<?php echo $attribute->attribute_id ?>"
                                    name="attributes[<?php echo $attribute->attribute_id ?>][]">
                               
                                <?php
                                $values = explode(',', $attribute->value_names);
                                sort($values);
                                $value_ids = explode(',', $attribute->value_id);
                                $value_prices = explode(',', $attribute->value_price);
                                while (list($key, $value) = each($values) and list($vkey, $value_id) = each($value_ids) and list($pkey, $value_price) = each($value_prices)) {
                                ?>
                                <option value="<?php echo $value; ?>_option_<?php echo $value_id; ?>_option_<?php echo $value_price; ?>"><?php echo $value; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <?php
                            } elseif ($attribute->type == 'textfield') {
                            echo "<label>Enter " . $attribute->name . "</label>";
                            ?>
                            <input value="" name="attributes[<?php echo $attribute->attribute_id ?>][]"
                                   id="attributes_<?php echo $attribute->attribute_id ?>"/>

                            <?php
                            }
                            }
                            ?>

						</li>
                        <li>  <label>Quantity</label>
                            <input value="1" name="quantity" id="quantity" class="form-control wa" />
						</li>
						<li>
                            <!--input class="btn pul-rgt green_back" type="submit" onclick="renderImageForCart();"
                                   id="btn_add_to_cart1" value="Add to Cart"/>-->
                            
                            <label>&nbsp</label>
								   <button class="btn pul-rgt green_back" type="submit" onclick="renderImageForCart();"
                                   id="btn_add_to_cart1"><i class="fa fa-cart-plus"></i> Add to Cart</button>
						</li>

                            {{--<input type="button" id="btn_add_to_cart" value="Add to Cart old" style="border-radius:2px;" />--}}
                            <input type="hidden" name="total_price" id="total_price" value="<?php echo $price; ?>"/>
                            <input type="hidden" name="price" id="price" value="<?php echo $price; ?>"/>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            
                             <input type="hidden" name="image_name" value="{{ $customized_image }}">
                            
                            <input type="hidden" name="product_id" id="product_id" value="<?php echo $id; ?>"/>
                            <input id="image_data" name="image_data" type="hidden">


                            {{--<img id="image_data_img"  width="2000px" height="2000px">--}}
							</ul>
							</div>
						  </div>
                        </form>

<script>
    
    
    
    
     </script>
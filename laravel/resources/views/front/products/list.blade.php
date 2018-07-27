<?php
$currency = Config::get('params.currency');


?> 
@if(count($products)>0)
@foreach ($products as $product)


					<div class="prod-box col-sm-4">
						<div class="prod__inr">
							<div class="prod__img img-cntr">
								<a href="<?php echo url('product/' . $product->id); ?>"><img src="{{ asset('uploads/products/thumbnail')}}/<?php echo $product->image; ?>" alt="" /></a>
							</div>
							<div class="prod__cont">
								<a href="<?php echo url('product/' . $product->id); ?>"><h3><?php echo $product->name; ?></h3></a>
						<?php //echo $product->teaser; ?>
						
						<div class="price">
                                                    <strong>$<?php echo $product->price; ?></strong>
                                                    <!--<span class="old-price">$<?php echo $product->price; ?></span>-->
                                                </div>
								<div class="prod__actions btn-atc">
									<a href="<?php echo url('product/' . $product->id); ?>" class="btn btn-primary">Customize Now</a>
								</div>
								<div class="prod__actions-addon clrlist listview">
									<ul>
<!--										<li><a href=""><i class="fa fa-heart"></i></a></li>
										<li><a href="#"><i class="fa fa-refresh"></i></a></li>-->
										<li><a href="<?php echo url('product/' . $product->id); ?>"><i class="fa fa-search"></i></a></li>	
									</ul>
								</div>
							</div>
						</div>
					</div>
					
					
		
		
@endforeach
@else
<div class="bg-warning">Sorry, there is no results for your search</div>
@endif

<?php
$currency = Config::get('params.currency');
?> 

@if(count($categories)>0)
@foreach ($categories as $category)

			<div class="prod-box col-sm-3">
				<div class="prod__inr">
					<div class="prod__img img-cntr">
						<a href="<?php echo url('category/'. $category->id); ?>"><img src="{{ asset('uploads/categories')}}/<?php echo $category->image; ?>" alt="" /></a>
					</div>
					<div class="prod__cont">
						<a href="<?php echo url('category/' . $category->id); ?>"><h3><?php echo $category->name; ?></h3></a>
						<?php //echo $product->teaser; ?>
						<div class="prod__actions btn-atc">
							<a href="<?php echo url('category/' . $category->id); ?>" class="btn btn-primary">View Products</a>
						</div>
					</div>
				</div>
			</div>
		
		
@endforeach
@else
<div class="bg-warning">Sorry, there is no results for selected Category</div>
@endif





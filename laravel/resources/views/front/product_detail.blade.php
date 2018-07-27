@extends('layout')
<?php
if (!empty($category)) {

    $title = $category->name;
    $description = $category->teaser;
    $keywords = $category->keywords;
} else {
    $title = 'Products';
    $keywords="";
    $description="";
}
?>
@include('front/common/meta')
@section('content')

	<section class="cont-area">
		<div class="container">
			
		<div class="cata__lft col-sm-3 hed-rgt">
					
				
				<form class="fom " action="{{ url('product-search')}}" role="search">
					<div class="form-group">
						<div class="input-group">
                                                    
						  <input  name="q" type="text" class="form-control" placeholder="Product Search.....">
                                                  <input  name="cat_id" type="hidden" value="{{ $id }}" class="form-control" placeholder="Product Search.....">
						  <span class="input-group-addon"><button><i class="fa fa-search"></i></button></span>
						
                                                
                                                </div>

					</div> 
				</form>
	  
	  
				<div class="cata__nav">

				
					<div class="hed">
						<h4>Product Categories</h4>
					</div>
					
					<nav class="navbar navbar-default" role="navigation">
					  <div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<!--<span class="visible-xs lineh50">Navigation</span>-->
						  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						  </button>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
						  <ul class="nav navbar-nav navbar-list">
                                                      
                                                      
                                                      @if(count($categories)>0)
                                                        @foreach ($categories as $category)
                                                        
                                                        @if($category->id == $id)
                                                        <li class="active"><a href="<?php echo url('category/' . $category->id); ?>">{{ $category->name }}</a></li>
                                                    @else
                                                    <li><a href="<?php echo url('category/' . $category->id); ?>">{{ $category->name }}</a></li>
                                                    @endif
                                                        
                                                      @endforeach
                                                        @else
                                                        <div class="bg-warning">No category Avaliable</div>
                                                        @endif
							
				
						  </ul>
						  
						</div><!-- /.navbar-collapse -->
					  </div><!-- /.container-fluid -->
					</nav>

					
				</div>
					
			</div>
			
			
			
			
			
			
			
			
			
			<div class="cata__rgt cata__grid col-sm-9 girdbox-area ">
			 
			 <div class="sort-area mt30 mb30">
				
						<div class="prod__inr">
							<div class="prod__img img-cntr">
								<a href="<?php echo url('product/detail/' . $product->id); ?>"><img src="{{ asset('uploads/products/thumbnail')}}/<?php echo $product->image; ?>" alt="" /></a>
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
								
							</div>
						</div>
					
				
				</div>
				
				<div class="clearfix"></div>
			
				<div class="prod-area feat-area row">
			
					<div class="clearfix"></div>
					
				</div>
				
			</div>
			
			
			
			
			
				<script>
					jQuery( "#girdBoxThumbStyle" ).click(function() {
						jQuery(".girdbox-area button").removeClass("active");
						jQuery(".girdbox-area").removeClass("girdbox-list");
						jQuery(".girdbox-area").addClass("girdbox-thumbnail");
						jQuery(this).addClass("active");
					});
					jQuery( "#girdBoxListStyle" ).click(function() {
						jQuery(".girdbox-area button").removeClass("active");
						jQuery(".girdbox-area").removeClass("girdbox-thumbnail");
						jQuery(".girdbox-area").addClass("girdbox-list");
						jQuery(this).addClass("active");
					});
				</script>
				
		
		</div>
	</section>	

	
<div class="clearfix"></div>
<div class="lnk-btn inline-block view-btn"></div>
@endsection
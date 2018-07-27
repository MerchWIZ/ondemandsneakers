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
@if(isset($category))
<section class="inr-bnr-area">
    <div class="inr-bnr-img">
        <img src="{{asset('')}}uploads/categories/<?php echo $category->image ?>" alt="<?php echo $title ?>">
        <div class="container">
            <div class="inr-bnr-cont prod-bnr-cont col-sm-12 anime-left">
                <h2><?php echo $title ?></h2> 				
                <h4><?php echo $category->teaser; ?></h4>
            </div>
        </div>
    </div>
</section>
@endif



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
							
<!--							<li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Custom Apparel</a>
							  <ul class="dropdown-menu">
								<li><a href="#">Product</a></li>
								<li><a href="#">Another Product</a></li>
							  </ul>
							</li>
							<li class="dropdown open">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Custom T-Shirt</a>
							  <ul class="dropdown-menu">
								<li><a href="#">Product</a></li>
								<li><a href="#">Another Product</a></li>
								<li><a href="#">Product</a></li>
								<li><a href="#">Another Product</a></li>
								<li><a href="#">Product</a></li>
								<li><a href="#">Another Product</a></li>
								<li><a href="#">Product</a></li>
								<li><a href="#">Another Product</a></li>
								<li><a href="#">Product</a></li>
								<li><a href="#">Another Product</a></li>
								<li><a href="#">Product</a></li>
							  </ul>
							</li>
							<li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Custom Hoodies</a>
							  <ul class="dropdown-menu">
								<li><a href="#">Product</a></li>
								<li><a href="#">Another Product</a></li>
							  </ul>
							</li>
							<li class="dropdown">
							  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Custom Ladies Apparel</a>
							  <ul class="dropdown-menu">
								<li><a href="#">Product</a></li>
								<li><a href="#">Another Product</a></li>
							  </ul>
							</li>-->
							
				
				


				
						  </ul>
						  
						</div><!-- /.navbar-collapse -->
					  </div><!-- /.container-fluid -->
					</nav>

					
				</div>
					
<!--					<div class="cata__tag mt50">
					
						<div class="hed">
							<h4>Tags</h4>
						</div>
						
						<div class="cata__tag__nav clrlist listview">
							<ul>
								<li><a href="#">Fashion <span class="badge">20</span></a></li>
								<li><a href="#">Stylish <span class="badge">10</span></a></li>
								<li><a href="#">Pure <span class="badge">05</span></a></li>
								<li><a href="#">Fabric <span class="badge">70</span></a></li>
								<li><a href="#">Cotton <span class="badge">35</span></a></li>
								<li><a href="#">Fresh <span class="badge">48</span></a></li>
								<li><a href="#">Tropical <span class="badge">15</span></a></li>
								<li><a href="#">Modern <span class="badge">40</span></a></li>
							</ul>
						</div>					
					
					</div>-->
					
					
					
				 
			 
			</div>
			
			
			
			
			
			
			
			
			
			<div class="cata__rgt cata__grid col-sm-9 girdbox-area ">
			 
			 <div class="sort-area mt30 mb30">
				<div class="gridbox-icons icon2x pul-lft">
					
					<button id="girdBoxThumbStyle" class="active"><i class="glyphicon glyphicon-th-large"></i></button>
					<button id="girdBoxListStyle"><i class="glyphicon glyphicon-th-list"></i></button> 
                                        <!--<span>Items 1-15 of 30</span>-->
				</div>
				
				
<!--				<div class="sort-area form-group pul-rgt">
                                    <select class="form-control" disabled="">
						<option value="Sort by: Custom">Sort by: Price</option>
						<option value="Sort by: Custom">Sort by: Custom</option>
					</select>
				</div>-->
				
				</div>
				
				<div class="clearfix"></div>
			
				<div class="prod-area feat-area row">
					
					
					@include('front/products/list')
					
			
					<div class="clearfix"></div>
			
 					
					
<!--					<div class="pagination-area">
						 <ul class="pagination">
						  <li><a href="#">Prev</a></li>
						  <li><a href="#">1</a></li>
						  <li><a href="#">2</a></li>
						  <li><a href="#">3</a></li>
						  <li><a href="#">Next</a></li>
						</ul>
					</div>-->
					
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
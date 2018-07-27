@extends('layout')

@section('content')

<style>
.chechout__inr {
    border: 1px solid #eee;
    padding: 15px;
    text-align: center;
    height: 290px;
    margin-bottom: 30px;
}

.chechout__inr:hover {
    box-shadow: 0 0 70px 20px #ddd;
}    
</style>



<div id="fh5co-contact" class="__web-inspector-hide-shortcut__">
    <div class="container">
        <?php
        $currency = Config::get('params.currency');
        ?>
        <div class="row">
            <div class="container-fluid">
                
                
                
                
                
                <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div  class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
          
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4>Add to Cart</h4>
      </div>
      <div id="cart_properties" class="modal-body overload">
          
           
          <div>
          <div id="caption"></div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
                
                
            <div class="hed"><h2>My Saved Designs</h2></div>
                
                @if(count($mydesign) == 0)
                You have no saved Design.
                @else
                
               @foreach ($mydesign as $design)
               
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4>Image Preview</h4>
      </div>
      <div class="modal-body">
          <div class="modal__img">
            <img id="modal_image" src="" />
          <div>
          <div id="caption"></div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
               
               <div class="checkout-img clrlist col-sm-3 text-center">
                   <div class="chechout__inr">
                   <div class="chechout__img text-center mb10">
                       <b><?php echo $design->title ?></b> 
                       <a>
                           <img onclick="showModal(this);" id="<?php echo $design->image_path ?>" src="{{ asset('uploads/customize_products/medium')}}/<?php echo $design->image_path ?>" />
                       </a>
                   </div>
                    <ul>
                        <li><a class="btn btn-info" download="merchwiz_image.png" href="{{ asset('uploads/customize_products/large')}}/<?php echo $design->image_path ?>" title="Download Image"><i class="fa fa-download fa-2x0"></i></a></li>
                        <li><a class="btn btn-info" id="<?php echo $design->image_path ?>" title="View Large" data-toggle="modal" onclick="showModal(this)"> <i class="fa fa-eye fa-2x0"></i></a></li>
                        <li><a class="btn btn-info" id="<?php echo $design->image_path ?>" title="Add to cart" data-toggle="modal" onclick="showCartModal(<?php echo $design->product_id?>,<?php echo $design->id?>)">  <i class="fa fa-shopping-cart fa-2x0"></i></a></li>
                        <li><a class="btn btn-info" href="{{ url('design').'/'.$design->id}}" title="Edit Design" ><i class="fa fa-pencil fa-2x0"></i></a></li>
                        <li><a class="btn btn-danger" href="{{url('/design/delete').'/'}}<?php echo $design->id ?>" title="Delete"><i class="fa fa-trash fa-2x0"></i></a></li>
                        
                    </ul>         
                   </div>
                </div>
               
               
               
               
               @endforeach
               @endif
            </div>
        </div>
    </div>
</div>
<script>
 function changePrice(attribute_id) {
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
        function changeColor() {
            var value = $("input:checked").val();
            var value = value.split("_");
            var image = "{{ asset('uploads/products_images/').'/' }}" + value[2];
            showShirtCanvas(image);
            // $("#slide_" + value[2]).trigger("click");
        }
function showModal(img){

var image_path = '{{ asset('uploads/customize_products/large')}}'+'/'+img.id;

console.log(image_path);
var modalImg = document.getElementById('modal_image');
modalImg.src = image_path;
//var captionText = document.getElementById("caption");

    modalImg.src = image_path;
    $('#myModal').modal('show');
        }
        
        
function showCartModal(id,design_id){

 var url = '{{ URL::to('/productcartinfo') }}';

        var comp_url = url + '/' + id+'/'+design_id;

                    $.ajax(
                    {
                        url: comp_url,
                        type: "GET",
                        data: '',
                        success: function (data, textStatus, jqXHR) {

                            $('#cartModal').modal('show');
                            document.getElementById('cart_properties').innerHTML = data;

                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                           // error
                        }
                    });

        }
</script>
@endsection

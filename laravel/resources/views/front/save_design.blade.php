@extends('shirt_layout')

@section('content')
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

<style>
html body .container{ width:1420px;
  }

</style>

    <main id="page-content" class="tool-area pb30">

        <section class="hdr-area white">
            <div class="container posrel">
                <div class="top-area col-sm-12 p0">
                    <div class="hed clrhm mt10 mb10"><span class="logo"><a class="navbar-brand" href="{{url('')}}/"><img src="{{asset('')}}/front/images/logo.png" alt="logo"/></a> </span><h3 class="p5">CUSTOMIZATION TOOL</h3></div>
                    @if($environment == 'development')
                        <div class="col-sm-5 pt10">
                            <button class="btn green_back" type="button" name="stroke" onclick="showShirtCanvas()">
                                SHIRT
                            </button>
                            <button class="btn green_back" type="button" name="stroke" onclick="showIphoneCanvas()">
                                IPHONE
                            </button>
                            <button class="btn green_back" type="button" name="stroke"
                                    onclick="showBuisnessCardCanvas()">BUSINESS CARD
                            </button>
                            <button class="btn green_back" type="button" name="stroke" onclick="showMugCanvas()">MUG
                            </button>
                        </div>

                    @endif

                </div>
            </div>
        </section>


        <section class="main-area">
          
            <?php 
            
            echo $mydesign[0]->data;
            
            ?>

        </section>

    </main>
	
	
				
<style>
.fnc-range div[role="progressbar"] {
    background-color: #4aa9f7;
    height: 5px;
    position: absolute;
    top: 0px;
}

.fnc-range .seekbar-progress {
    height: 5px;
    position: relative;
    overflow: hidden;
    margin-top: -10px;
    width: 95%;
    border-radius: 5px;
}

.fnc-range input[type="range"] {
    -webkit-appearance: none !important;
    width: 100%;
    height: 6px;
    background-color: #23282e !important;
    border-radius: 15px;
    padding: 0px;
}

.fnc-range input[type="range"]:hover {
  background-color: #b2d5aa;
}

.fnc-range input[type="range"]::-webkit-slider-thumb {
  -webkit-appearance: none !important;
  width: 10px;
  height: 20px;
  /* background-color: #95bd3a !important; */
  background-image: url("images/rang-icon.png");
  border-radius: 4px;
  box-shadow: 0px 0px 3px #3c6d59;
  background-repeat:no-repeat;
  z-index:2;
}

.fnc-range input[type="range"]::-webkit-slider-thumb:hover {
  background-color: #457d66;
}

.fnc-range input[type="range"]::-webkit-slider-thumb:active {
  box-shadow: 0px 0px 1px #3c6d59;
}
</style>
				
<script>

function qs(s) { return document.querySelector(s) }

var handle = qs('.fnc-range input[type="range"]');
var progressbar = qs('.fnc-range div[role="progressbar"]');

handle.addEventListener('input', function(){
  progressbar.style.width = this.value + '%';
  progressbar.setAttribute('aria-valuenow', this.value);
});



if (navigator.appName == 'Microsoft Internet Explorer' ||  !!(navigator.userAgent.match(/Trident/) || navigator.userAgent.match(/rv:11/)) || (typeof $.browser !== "undefined" && $.browser.msie == 1))
{
  jQuery("html").addClass("ie");
}



function getHtml(){

document.getElementById("html_data").value = $('html').html();
console.log( $('html').html());

}

</script>
				
				
@include('front/customization_tool_js/script')
@endsection

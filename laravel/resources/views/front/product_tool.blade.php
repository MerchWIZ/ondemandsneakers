@extends('shirt_layout')

@section('content')
<?php

$currency = Config::get('params.currency');

$design_id = 0;
$design_title = "";
$design_description = "";
//        $environment = 'development';
$environment = 'live';

if ($product->sale == 1 && $product->price > $product->salePrice) {
    $price = $product->salePrice;
} else {
    $price = $product->price;
}


if(count($savedDesign) == 1){
    $design_id = $savedDesign[0]->id;
    $design_title = $savedDesign[0]->title;
    $design_description = $savedDesign[0]->description;

}

?>
<style>
    html body .container{ width:1420px; }

    .preloadized { overflow: hidden; }
    .preloadized #preloader1 { position: fixed; top: 0; left: 0; right: 0; bottom: 0; background-color:rgba(0,0,0,.5); z-index: 5555; }
    .preloadized #preloader__status1 { width: 32px; height: 32px; position: absolute; left: 50%; top: 50%; margin: -15px 0 0 -15px;  border-radius: 50%; z-index: 7777; color:#fff; }

    .main__tool {
        z-index: 55;
        background-color: #fff;
        overflow: hidden0;
    }

    .main__tool .tab-content {
        background: #fff;
    }

    .extra-imgs ul li h5 {
        border-top: 1px solid #ccc;
        margin-top: 0;
        padding-top: 5px;
        margin-bottom: 5px;
    }
    
   
        
        .preview__img{
            overflow: scroll;
        }
        .mt80{
            position: static !important;
        }
        
        
        .main__preview {
    width: 100%;
    border: 1px solid #ccc;
    float: left;
    padding-left: 0 !important;
    margin-right: 0px;
    padding-right: 0;
}

html body.product-page .container{ width:100%; }


#toolArea {
    /* display: none; */
    margin-left: -36%;
}


.btn-primary {
    background-color: #4aa9f7;
    border-color: #4aa9f7;
}

#viewTool,
#fitToScreen {
    padding: 8px;
    font-weight: 500;
    top: -4px;
    position: relative;
    margin-left: 10px;
    cursor: pointer;
}


body .main__tool {
    overflow-y: auto;
    height: 90vh;
}


#toolArea {
    position: fixed;
    height: 100vh;
    top: 0vh;
    left: 0px;
    z-index: 9;
	padding: 10px;
    background-color: #fff;
    border-radius: 0px;
}


#toolArea.show {
    margin-left: 0;
    left: 0;
    border: 1px solid #ccc;
    
}



#viewTool:before {
    content: attr(data-text);
	font-weight: bolder;
}

#fitToScreen:before {
    content: attr(data-text);
}

#toolArea #viewTool:before {
    display: none;
}



/*test*/
.fit-to-screen{
    transform: scale(0.65);
    float: left;
    width: auto !important;
}

.fit-to-screen canvas {
    margin-top: -10em;
    border: 0 !important;
}


#viewTool.is-active:before {
    content: "Show";
}

#toolArea.show+.main__preview {
    margin-left: 515px;
}

#fitToScreen.is-active:before {
    content: "Restore";
}

.br0 {
    border-radius: 0;
    font-size: 15px;
}

.upload-li{
    margin-left: 20px;
    border: none;
}



.objfit{ height:100px; margin-bottom:30px; }
.objfit img { /* optional */
  width: 100%;
  height: 100%; 
  background: #eee;
}

.objfit-contain img {
  object-fit: contain;
}

.objfit-cover img {
  object-fit: cover;
}

.objfit-none img {
  object-fit: none;
}

a.objfit.objfit-cover {
    height: 70px;
    display: inline-block;
    width: 80px;
    margin-bottom: 8px;
    margin-left: 3px;
}

div#toolAreaToggle {
    position: absolute;
    width: 2px;
    background-color: #42a5f6;
    z-index: 999;
    display: inline-block;
    text-align: center;
    height: 100%;
    right: -2px;
    color: #fff;
    top: 0;
}

#toolAreaToggle span#viewTool {
    display: inline-block;
    margin-top: 4px;
    font-size: 11px;
    margin-left: 0px;
    /* transform: rotate(90deg); */
    /* width: 140px; */
    top: 16.2%;
    right: -2px;
    border-radius: 0;
    padding: 4px;
    /* background-color: #42a5f6; */
    box-shadow: 0px 0px 0px 2px #257dc5;
    /* border-radius: 8px 8px 0 0; */
}


#toolAreaToggle span#viewTool .fa {
    font-size: 14px;
    /* position: absolute; */
    /* margin-left: -90px; */
    /* background-color: #4aa9f7; */
    /* transform: rotate(-90deg); */
    padding: 4px;
    /* top: 0px; */
}

.element-area ul {
    margin-top: 0;
}

.main__preview, .main__tool {
    height: auto;
    margin-bottom:0;
}


/**color**/
.prodcolors .list-col-4 {
    display: none;
}

.prodcolors hr {
    display: none;
}

body .nav-tabs>li>a {
    margin: 4px 2px;
    position: relative;
    border-radius: 4px;
}

body .nav-tabs>li>a {
    margin: 4px 2px;
    position: relative;
    border: 1px solid #eee;
    border-radius: 5px;
    box-shadow: 0 2px 0 0px #ddd;
    background-color:#f7f7f7;
}

.panel-default.active > .panel-heading {
    border: 0;
    border-radius: 4px;
}

.panel-default>.panel-heading+.panel-collapse>.panel-body {
    border: 0;
}

.panel-default > .panel-heading.green_back {
    margin: 10px 0;
    border: 1px solid #eee;
    border-radius: 5px;
    box-shadow: 0 2px 0 0px #ddd;
}

.note.pb10 { 
    max-width: 480px;
}

.panel-default.active > .panel-heading.green_back {
    box-shadow: 0 3px 0 0 #246fad;
    border: 0;
}

body .main__tool{
width:494px;	
}

#viewTool.is-active .fa-edit {
    display: block;
}

#viewTool.is-active .fa-times {
    display: none;
}

#viewTool .fa-edit {
    display: none;
}

#viewTool .fa-times {
    display: block;
}

</style>

<main id="page-content" class="tool-area pb30 preloadized">

    <div id="preloader1" style="display: none">
        <span id="preloader__status1">

            <img width="300px" height="300px" src="{{asset('')}}/front/tool/images/loading.gif" alt="img" />

            <h4>LOADING FILES ...</h4>

        </span>
    </div>

    
    @if (Session::has('success'))
    <div class="alert alert-success">
        <h4><i class="icon fa fa-check"></i> &nbsp  {!! session('success') !!}</h4>
    </div>
    @endif

    <section class="hdr-area white">
        <div class="container posrel">
            <div class="top-area col-sm-12 p0">
                <div class="hed clrhm mt10 mb10">
                    <span class="logo"><a class="navbar-brand" href="{{url('')}}/"><img src="{{asset('')}}/front/images/logo.png" alt="logo"/></a> </span>
                    <h3 class="p5">CUSTOMIZATION TOOL 
                        <span class="btn-xs btn-primary viewTool" id="viewTool" data-text="hide"> Toolbar</span>
                        <span class="btn-xs btn-primary is-active" id="fitToScreen" data-text="Fit to"> Screen
							 
						</span>
                    </h3>
                    <a class="btn green_back pul-rgt" href="{{ url('/category/'.$product->category_id) }}">Go Back to Product Page</a>
					
					<span id="send_orb_req" style="display: none;"><button class="btn pul-rgt mt0 green_back mr10" type="button" onclick="makeTexturedImageFromCanvas();" id="apply_changes">Apply Changes</button></span>
										
                </div>


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
    <div id="tool_div" class="container ">

	<div class="show" id="toolArea">
	
		<div id="toolAreaToggle">
			<span class="btn-xs btn-primary viewTool" id="viewTool" data-text="hide">
				<i class="fa fa-edit"></i>
				<i class="fa fa-times"></i>	
			</span>
				
		</div>
			
			<div class="note pb10">
				<b>Note:</b> Please click on "Restore Screen" button for customization, customization not available in "fit to screen" mode.  </div> 
        <div class="main__tool tool-area col-xs-4 p0 bg-white" >
		
		
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab1" data-toggle="tab" class="">Items</a></li>
                <li ><a href="#tab2" data-toggle="tab" class="">Text Editor</a></li>
                <li><a href="#tab3" data-toggle="tab" class="">Save</a></li>
            </ul>

            <div class="tab-content">

                <div class="tab-pane overload accordion-arr active" id="tab1">
                    <div class="panel-group" id="accordion">

                       <div class="active panel-default">
                        <div class="panel-heading green_back">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
                                    <i></i>Texture Image
                                </a>
                            </h4>
                        </div>
                        <div id="collapse6" class="panel-collapse collapse in">


                            <div class="panel-body pt0">
								<h4>Select Sole Color</h4>
							   
								<button class="btn pul-rgt mt0 green_back mt10" type="button" onclick="getSelectedTexturedImage(G_selected_texture_image,G_product_id);" id="apply_texture">Apply Texture</button>
							
								<select class="form-control w40" id="shoes_sole" name="shoes_sole" onchange="updateSoleColor();">
									<option value="white">white</option>
									<option value="black">Black</option>
								</select>


                            <h4>Upload Image</h4>

                            <form id="form_save_texture" method="post" enctype="multipart/form-data">

                                <h6>See Media uploading <a onClick="showImageTerms()"> terms and conditions</a>.</h6>

                                
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="file" name="image1" id="image1"  class="form-control" />

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <span class="input-group-addon p0"><button class="btn btn-primary br0">Upload Image</button></span>
                                    </div>
                                </div>
                                
                                
                                <div class="clearfix"></div>
                                <h6>You can choose the file format JPG file no larger than 1MB</h6>
                                <!--<button onclick="uploadTextureImage();" class="btn pul-lft green_back" type="button"> Load Texture</button>-->
                                <div class="clearfix"></div>
                            </form>   



                            @if(count($productImages) > 0)
                            <div id="texture_gallery">
                                @if(count($userTestures) >0)

                                <h4>Image Gallery</h4>
								<div class="texture-area">
									
                                @foreach($userTestures as $texture)

                                <!--<img width="100px" height="100px" src="{{ asset('uploads/texture_patterns')."/".$texture->image }}" onclick="getTexturedImage('{{ $texture->image }}','{{ $product->id }}')" >-->
                                @if(File::exists(public_path('uploads/texture_patterns/'.$texture->image)))
									<a class="objfit objfit-cover"><img width="100px" id="{{'texture_img_'.$texture->id }}" height="100px" src="{{ asset('uploads/texture_patterns')."/".$texture->image }}" onclick="updateTextureImageParams('{{ $texture->image }}','{{'texture_img_'.$texture->id }}')" ></a>
                                @endif

                                @endforeach
									
								</div>
								
                                @endif

                            </div>
                            <h4>Adjust size of Image</h4>
                            <h7>Change image size before select any image.</h7>

                            50%<input id="texture_scale" name="texture_scale" type="range" min="10" max="200" step="1" onchange="changeTextureScale(this.value)"/> 150% 



                            @endif




                        </div>



                    </div>
                </div>





                @foreach($customize_items as $key => $value)

                <div class="panel panel-default">
                    <div class="panel-heading green_back">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#{{ 'collapse_'.preg_replace('/\s+/', '', $key) }}">
                                <i></i> {{ $key }}
                            </a>
                        </h4>
                    </div>
                    <div id="{{ 'collapse_'.preg_replace('/\s+/', '', $key) }}" class="panel-collapse collapse">
                        <div class="panel-body">

                            <div class="element-area clrboth list-col-4">
                                <ul>

                                    @foreach($value as $items)
                                    <li><a href="#" onclick="return addItemImage('{{ $items->image }}')"><img
                                        src="{{ asset('uploads/tool_items')."/".$items->image }}" alt=""/></a></li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>

                    @endforeach


                    <div class="panel panel-default">
                        <div class="panel-heading green_back">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                    <i></i> Upload Image
                                </a>
                            </h4>
                        </div>
                        <div id="collapse5" class="panel-collapse collapse">

                                        <div class="panel-body">
                                           @if(count($productImages) > 0)                                       


                                         <form id="form_save_item_image" method="post" enctype="multipart/form-data">


                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="file" name="image1" id="image1" class="form-control" />

                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <span class="input-group-addon p0">
                                                <button class="btn btn-primary br0">Upload Image</button>
                                            </span>
                                            </div>
                                        </div>
                                            <div class="clearfix"></div>
                                            <h6>See Media uploading <a onClick="showImageTerms()"> terms and conditions</a>.</h6>
                                            <h6>You can choose the file format JPG file no larger than 1MB</h6>
                                            <!--<button onclick="uploadTextureImage();" class="btn pul-lft green_back" type="button"> Load Texture</button>-->
                                            <div class="clearfix"></div>
                                        </form>  

                                        @endif
                                    </div>

                                </div>
                            </div>


                            @if($environment == 'development')
                            <input type="button" value="undo" onclick="undo()">
                            <input type="button" value="redo" onclick="redo()">

                            <input type="button" value="getHtml" onclick="getHtml()">

                            <input type="button" value="Lion" onclick="getTexturedImage('rocks.jpg','0')">
                            <input type="button" value="Rock" onclick="getTexturedImage('tiger.jpg','0')">
                            <input type="button" value="third" onclick="getTexturedImage('heart-test.jpg','0')">

                            <input type="button" value="Masking" onclick="createMask();">



                            <form class="prod-detail-form" action="../cart/showPage"method="post">

                              <input type="hidden" id="html_data" name="html_data" id="html_data"/>
                              <input type="hidden" id="abc" value="testing" name="abc" id="html_data"/>
                              <!--                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">-->
                              <button class="btn pul-rgt green_back" type="submit" onclick="getHtml();"> Show Html</button>

                          </form>   

                          @endif
                      </div>


                  </div>
                  <div class="tab-pane" id="tab2">


                    <div class="text-area bg-silver ">
                        <!--<div class="hed green_back clrhm white p10">-->
                        <!--<h4>Text Here</h4>-->
                        <!--</div>-->

                        <div class="form-group mt10">
                            <textarea id="my_text" name="add_text2" class="form-control bg-gray"
                            placeholder="Your Text Here"></textarea>
                        </div>
                    </div>
                    <div class="font-area fc30x30 bg-white col-xs-12 pt10 pb10  control-group inline-control">


                        <select class="form-control" id="font_selector" onchange="clickListener(this)">
<!--                                    <option value="VeraSansMono-Oblique">VeraSansMono Oblique</option>
                                    
                                      <option value="caslonop">Caslonop</option>
                                      <option value="VeraSerif-Bold">VeraSerif Bold</option>
                                      <option value="VeraSansMono-Oblique">VeraSansMono Oblique</option>-->

                                      <!--<option value="Times New Roman">Times New Roman</option>-->
                                      <option value="arial">Arial</option>
                                      <!--<option value="myriad pro">Myriad Pro</option>-->
                                      <!--<option value="delicious">Delicious</option>-->
                                      <option value="verdana">Verdana</option>
                                      <option value="georgia">Georgia</option>
                                      <!--<option value="courier">Courier</option>-->
                                      <!--<option value="comic sans ms">Comic Sans MS</option>-->
                                      <option value="plaster">Plaster</option>
                                      <option value="impact">Impact</option>
                                      <option value="monaco">Monaco</option>                             

                                      <span class="caretOne"></span>
                                  </select>

                                  <input class="form-control" id="text_color_code" type="color" name="text_color"
                                  value="#e22a2a" onchange="clickListener(this)">

                                  <input class="form-control" id="size_selector" type="number" name="text_size" value="20"
                                  onchange="clickListener(this)">

                                  <button id="btn_addtext" class="btn green_back" onclick="AddText()">Add Text</button>


                              </div>
                              <div class="stroke-area fc30x30">
                                <div class="stroke-box col-xs-4 control-group inline-control">
                                    <h5>Stroke</h5>
                                    <button id="btn_stroke_toggle" class="form-control" type="button"
                                    name="stroke_toggle" onclick="clickListener(this)"><i
                                    class="fa fa-paint-brush"></i></button>
                                    <input id="stroke_color_code" class="form-control non-ie" type="color"
                                    name="background_color" value="#35a7e1" onchange="setStrokeColor()" />

                                    <div class="only-ie form-control color-selector0">
                                        <input type="text" name="clr2" value="" style="display:none"/>
                                        <button class="iecolorpicker" onclick="var s = Dlg2.ChooseColorDlg(clr2.value); window.event.srcElement.style.backgroundColor = s; clr2.value = s"></button>
                                        <object id="Dlg2" classid="CLSID:3050F819-98B5-11CF-BB82-00AA00BDCE0B" width="0" height="0"></object></div>

                                        <input id="stroke_size_selector" class="form-control" type="number" name="align"
                                        value="1" onchange="setStrokeSize()">
                                    </div>

                                    <div class="background-box col-xs-4 control-group inline-control p0">
                                        <h5>Background color</h5>
                                        <div class="cntr-all">
                                            <div class="form-group hidden-checkbox pul-lft">
                                                <input type="checkbox" id="text_bg_toggle" class="is-changed is-valid non-ie" />
                                                {{--<div class="checkylbl ">--}}
                                                {{--<label for="toggle" class="green_back"></label>--}}
                                                {{--</div>--}}
                                            </div>

                                            <input id="text_bg_color_code" class="form-control non-ie" type="color" name="background_color" value="#35a7e1" onchange="clickListener(this)" />

                                            <span class="only-ie form-control color-selector">
                                                <input type="text" name="clr" value="" style="display:none"/>
                                                <button class="iecolorpicker" onclick="var s = Dlg2.ChooseColorDlg(clr.value); window.event.srcElement.style.backgroundColor = s; clr.value = s"></button>
                                                <object id="Dlg" classid="CLSID:3050F819-98B5-11CF-BB82-00AA00BDCE0B" width="0" height="0"></object></span>

                                            </div>
                                        </div>

                                        {{--<div class="align-box col-xs-4 control-group inline-control">--}}
                                        {{--<h5>Align</h5>--}}
                                        {{--<button id="btn_align_left" class="form-control" type="button" name="stroke"><i class="fa fa-align-left"></i></button>--}}
                                        {{--<button id="btn_align_center" class="form-control" type="button" name="stroke"><i class="fa fa-align-center"></i></button>--}}
                                        {{--<button id="btn_align_right" class="form-control" type="button" name="stroke"><i class="fa fa-align-right"></i></button>--}}
                                        {{--</div>--}}

                                    </div>

                                    <div class="style-area fc30x30 black bg-white  col-xs-12 pb10 pl0">

                                        <div class="col-xs-8 inline-control">
                                            <h5>Style</h5>
                                            <button title="Bold" id="btn_bold" class="form-control " type="button" name="stroke"
                                            onclick="clickListener(this)">
                                            <i class="fa fa-bold"></i></button>
                                            <button title="Italic" id="btn_italic" class="form-control" type="button"
                                            name="stroke" onclick="clickListener(this)">
                                            <i class="fa fa-italic"></i></button>

                                            <button title="Shadow" id="btn_shadow" class="form-control" type="button"
                                            name="stroke" onclick="clickListener(this)">
                                            <i class="fa fa-adjust"></i></button>

                                            <button title="Underline" id="btn_underline" class="form-control" type="button"
                                            name="stroke" onclick="clickListener(this)">
                                            <i class="fa fa-underline"></i></button>
                                            <button title="Overline" id="btn_overline" class="form-control" type="button"
                                            name="stroke" onclick="clickListener(this)">
                                            <i class="fa fa-header"></i></button>
                                            <button title="Line Through" id="btn_linethrough" class="form-control" type="button"
                                            name="stroke" onclick="clickListener(this)">
                                            <i class="fa fa-strikethrough"></i></button>
                                        </div>

                                    </div>


                                </div>
                                <div class="tab-pane" id="tab3">

                                    <div class="panel-group" id="accordion2">


                                        <div class="panel active panel-default">
                                            <div class="panel-heading green_back">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse_save2">
                                                        <i class="fa fa-github-alt"></i> Save Design
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapse_save2" class="panel-collapse collapse in">
                                                <div class="panel-body">


                                                    <form id="form_save_design" action="{{url('/tool/saveDesign')}}" method="post">

                                                        <div class="form-group">
                                                            <b>Title:</b>
                                                            <input class="form-control" type="text" name="title" id="title"
                                                            placeholder="Enter your design name" value="<?php echo $design_title; ?>" maxlength="25"/>
                                                        </div>


                                                        <div class="form-group">
                                                           <!--<b>Description:</b>-->
                                                           <textarea style="display:none;" class="form-control" name="description" type="text" id="description"
                                                           placeholder="Your comment note"><?php echo $design_description; ?></textarea>
                                                       </div>

                                                       <input type="hidden" id="image_data2" name="image_data2"/>
                                                       <input type="hidden" id="design_id" name="design_id" value=<?php echo $design_id; ?>/>
                                                       <input type="hidden" name="product_id" id="product_id" value="<?php echo $id; ?>"/>
                                                       <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                       <input type="hidden" id="design_data" name="design_data">
                                                       <input type="hidden" id="design_orb_request" name="orb_request">

                                                       <?php
                                                       if (isset(Auth::user()->id)) {
                                                           ?>
                                                           <button id="save_design" class="btn pul-lft green_back" type="submit" onclick="renderImageForCart();"> Save Design</button>

                                                           <?php
                                                       } else {
                                                        ?>
                                                        <button data-toggle="modal" onclick="showModal()" class="btn pul-lft green_back" type="button"> Save Design</button>

                                                        <!--<li><a class="btn btn-info" data-toggle="modal" onclick="showModal(this)">View Enlarge</a></li>-->
                                                        <div class="clearfix"></div>

                                                        <?php
                                                    }
                                                    ?>

                                                    <!--<button class="btn pul-lft green_back" type="button"> Goto My Designs</button>-->
                                                </form>

                                                <form id="form_apply_design"  method="post">
                                                    <input type="hidden" id="image_data3" name="image_data3"/>
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="hidden" id="source_image" name="source_image">
                                                    <input type="hidden" id="texture_path" name="texture_path">
                                                    <input type="hidden" id="product_caption" name="product_caption">
                                                    <input type="hidden" id="image_view" name="image_view">
                                                    <input type="hidden" id="sole_color" name="sole_color">
                                                    <input type="hidden" id="texture_inside" name="texture_inside">
                                                    <input type="hidden" id="texture_outside" name="texture_outside">
                                                    <input type="hidden" id="texture_top" name="texture_top">
                                                    <!--                new fields added by shm to incorporate add item and text functionality via Liquifire OS instead of client side screen capture-->
                                                    <input type="hidden" id="target_type" name="target_type">
                                                    <input type="hidden" id="item_x" name="item_x">
                                                    <input type="hidden" id="item_y" name="item_y">
                                                    <input type="hidden" id="item_w" name="item_w">
                                                    <input type="hidden" id="item_h" name="item_h">
                                                    <input type="hidden" id="item_src" name="item_src">
                                                    <input type="hidden" id="canvas_image" name="canvas_image">

                                                    <input type="hidden" id="text_font" name="text_font">
                                                    <input type="hidden" id="text" name="text">
                                                    <input type="hidden" id="text_x" name="text_x">
                                                    <input type="hidden" id="text_y" name="text_y">
                                                    <input type="hidden" id="text_point_size" name="text_point_size">
                                                    <input type="hidden" id="text_color" name="text_color">
                                                    
                                                    <input type="hidden" id="image_w" name="image_w">
                                                    <input type="hidden" id="image_h" name="image_h">
                                                    <input type="hidden" id="g_product_id" name="g_product_id">
                                                    

                                                </form>


                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <form id="form_add_to_cart" class="prod-detail-form" action="../cart/addcustomizeproduct"
                            method="post">
                            <div class="prodcolors fom-bdr / col-xs-12 bdr1 p10 mt-1">
                                <!--<div class="text-center"><h5>Colors</h5></div>-->
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
                           

                        </li>

                        {{--<input type="button" id="btn_add_to_cart" value="Add to Cart old" style="border-radius:2px;" />--}}
                        <input type="hidden" name="total_price" id="total_price" value="<?php echo $price; ?>"/>
                        <input type="hidden" name="price" id="price" value="<?php echo $price; ?>"/>
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="product_id" id="product_idd" value="<?php echo $id; ?>"/>
                        <input id="image_data" name="image_data" type="hidden">
						<input type="hidden" id="cart_orb_request" name="orb_request" />

                        {{--<img id="image_data_img"  width="2000px" height="2000px">--}}

                        <li><button class="btn pul-rgt mt0 green_back" type="submit" onclick="renderImageForCart();" id="btn_add_to_cart1"><i class="fa fa-cart-plus"></i> Add to Cart</button></li>
                    </ul>

                </div>

                <div class="clearfix"></div>
                @if(1 ==2)
                <div class="extra-imgs clrlist bdr1 mt10 text-center pb10">
                    <h4>Product Images</h4>
                    <ul>
                       <?php
                       if (count($productImages) > 0) { 
                        for($i=0; $i<count($productImages); $i++){
                               // if(!strpos($productImages[$i]->name, 'factory') !== false){
                            ?>
                            <li class='bdr1 1'>

                               <a><img width="60px" height="60px"  id="<?php echo $productImages[$i]->name; ?>" onclick="showCanvas('{{ asset('uploads/products_images').'/'.$productImages[$i]->image }}','{{ $productImages[$i]->name }}'),updateSelectedImageVariable('{{ $productImages[$i]->name }}'),'{{ $productImages[$i]->caption }}','','{{ $productImages[$i]->image }}')" src="{{ asset('uploads/products_images/thumbnail').'/'.$productImages[$i]->image}}"></a>
                               <h5><?php echo $productImages[$i]->name;?></h5>
                           </li>

                           <?php 

                           // } 
                       }
                   } 
                   ?>           
               </ul>
           </div>  
           @endif
           @if(1 ==2)
           <div class="extra-imgs clrlist bdr1 mt10 text-center pb10">
            <h4>Product Images</h4>
            <ul>
               <?php
               if (count($productImages) > 0) { 
                for($i=0; $i<count($productImages); $i++){
                    if(strpos($productImages[$i]->name, 'factory') !== false){
                        ?>
                        <li class='bdr1 2'>

                           <a><img width="60px" height="60px"  id="<?php echo $productImages[$i]->name; ?>" onclick="showCanvas('{{ asset('uploads/products_images').'/'.$productImages[$i]->image }}','{{ $productImages[$i]->name }}'),updateSelectedImageVariable('{{ $productImages[$i]->name }}'),'{{ $productImages[$i]->caption }}','','{{ $productImages[$i]->image }}')" src="{{ asset('uploads/products_images/thumbnail').'/'.$productImages[$i]->image}}"></a>
                           <h5><?php echo $productImages[$i]->name;?></h5>

                       </li>

                       <?php 

                   } 
               }
           } 
           ?>           
       </ul>
   </div>  

   @endif
</div>

</form>

</div>

<div class="cart-area0 bg-white col-xs-12 p0">

                        {{--<button class="btn pul-rgt green_back" type="button" name="stroke" disabled>Add to Cart</button>--}}
                    </div>
                    
                    

                </div>
</div>

                <div class="main__preview preview-area col-xs-12 pl50">

                    @if($environment == 'development')
                    <div class="shirt-sides clrlist listview">
                        <ul>
                            <li id="btn_shirt_front"><a href="#" onclick="return shirtViews('front');"><img
                                src="images/shirt-mini.png" alt=""/></a></li>
                                <li class="active" id="btn_shirt_back"><a href="#" onclick="return shirtViews('back');"><img
                                    src="images/shirt-mini.png" alt=""/></a></li>
                                </ul>
                            </div>

                            @endif
                            <div class="preview__img text-center p0" onscroll="setMyOffset();">
                                <canvas id="c" class="text-center bdr1" width=1982 height=972
                                style="border:1px solid #eee; height: 90vh !important" ></canvas>
                                
                            </div>    
                                <div class="extra-imgs clrlist mt10 text-center pb10">

                                    <ul>                                        
                                       <?php
                                       if (count($productImages) > 0) {
                                           $count =0;
                                        foreach($productImages as $image){
                                            if($count==0) {?>
<!--                                            <li class="bdr1 3">
                                                <a><img width="60px" height="60px"  id="preview" onclick="showCanvas('{{ asset('uploads/products_images').'/'.$image->image }}','{{ $image->name }}'),updateSelectedImageVariable('{{ $image->name }}'),'{{ $image->caption }}','','{{ $image->image }}')" src="{{ asset('uploads/products_images/thumbnail').'/'.$image->image}}"></a>
                                                <h6>3D Preview</h6>                                
                                            </li> -->
                                            <?php } ?>
                                            <li class='bdr1 3' >
                                                <a><img width="60px" height="60px"  id="<?php echo $image->name; ?>" onclick="showCanvas('{{ asset('uploads/products_images').'/'.$image->image }}','{{ $image->name }}'),updateSelectedImageVariable('{{ $image->name }}'),'{{ $image->caption }}','','{{ $image->image }}')" src="{{ asset('uploads/products_images/thumbnail').'/'.$image->image}}"></a>
                                                <h6><?php echo ucwords($image->name);?></h6>                                
                                            </li>

                                            <?php 
                                            $count++;

                                        }?>
                                        <li class='bdr1 3' id="factory_list" style="display:none;" title="Download Large Factory Template" >
                                            <a href="" id="download" download><img width="60px" height="60px" id="large_factory_img" src="#"></a>
                                            <h6>Download Factory</h6h>
                                        </li>
                                    <?php } ?>
                                        <li class='bdr1 3 upload-li'>
										<!--
										<span id="send_orb_req" style="display: none;"><button class="btn pul-rgt mt0 green_back" type="button" onclick="makeTexturedImageFromCanvas();" id="apply_changes">Apply Changes</button></span>
										-->
										</li>                                            
                                </ul>
                            </div>  
                            
                            

                        

                        <div class="preview__bottom  text-center p0 bg-white col-xs-12"  id="obj_controls" >

                            @if(1 ==2)
                            <div class="preview_tool1 col-xs-4 fc30x30 inline-control p0">
                                <button title="Zoom in" class="form-control" type="button" name="stroke" onclick="ZoomIn()">
                                    <i class="fa fa-search-plus"></i></button>
                                    <button title="Zoom out" class="form-control" type="button" name="stroke"
                                    onclick="ZoomOut()">
                                    <i class="fa fa-search-minus"></i></button>
                                    <button title="Reset Zoom" class="form-control" type="button" name="stroke"
                                    onclick="ResetZoom()">
                                    <i class="fa fa-random"></i></button>
<!--                            <button title="Panning " class="form-control" type="button" name="stroke" disabled>
    <i class="fa fa-arrows"></i></button>-->
</div>
@endif
<div class="preview_tool2 col-xs-3 inline-control fnc-range clrhm black">
    <h5>Transparency</h5>
    <!--input id="opacity_range" class="form-control" type="range" value="1"-->

    <input id="opacity_range" class="form-control" type="range" min="0" max="1" step="0.01"
    value="1" onchange="changeOpacity(this.value)">
    <div class="seekbar-progress hidden">
        <div role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"
        style="width: 0%;"></div>
    </div>

    <script>
        
        function setMyOffset() {
            canvas.calcOffset();
        }
        
        function qs(s) {
            return document.querySelector(s)
        }

        var handle = qs('.fnc-range input[type="range"]');
        var progressbar = qs('.fnc-range div[role="progressbar"]');

        handle.addEventListener('input', function () {
            progressbar.style.width = this.value + '%';
            progressbar.setAttribute('aria-valuenow', this.value);
        });

    </script>


</div>
<div class="preview_tool3 col-xs-5  fc30x30 inline-control pr0">

    <button title="Send Back" id="sendBack" class="form-control" type="button" name="stroke"
    onclick="sendBack()">
    <i class="fa fa-clone"></i></button>
    <button title="Bring Front" id="sendFront" class="form-control" type="button" name="stroke"
    onclick="sendFront()">
    <i class="fa fa-object-ungroup"></i></button>
    <button title="Flip Horizontal" id="flipHorizontal" class="form-control" type="button"
    name="stroke" onclick="flipHorizontal()">
    <i class="fa fa-exchange"></i></button>
    <button title="Flip Vertical" id="flipVertical" class="form-control" type="button"
    name="stroke" onclick="flipVertical()">
    <i class="fa fa-exchange"></i></button>
    <button title="Duplicate" id="duplicate" class="form-control" type="button" name="stroke"
    onclick="duplicateObject()">
    <i class="fa fa-picture-o"></i></button>
    <button title="Delete" id="delete" class="form-control" type="button" name="stroke"
    onclick="RemoveSelectedItems()">
    <i class="fa fa-trash"></i></button>

</div>


</div>


</div>
<div class="clearfix"></div>
</div>

</section>

<section class="prod-detail-area">
 <div class="container">
    <div class="prod__price h3"> 
       Price: <?php echo  $currency['USD']['symbol'] .$product->price; ?>
   </div>

   <div class="prod__cata h4">
    Catergoy: <a href="{{ url('/category/'.$category['id']) }}">{{ $category['name'] }}</a>
</div>

<div class="prod__desc">
   <?php
   echo $product->description;
   ?>
</div>
</div>
</section>


<div class="container-fluid">


    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div  class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4>Login Form</h4>
        </div>
        <div class="modal-body overload">
          <div id="errors_login"></div>
          <!--@include('front/customers/login_form_ajax')-->
          <form id="loginForm" method="POST" class="form" action="{{ URL::to('/postLoginPopup') }}">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required />
            </div>

            <div class="form-group">
                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required  />
            </div>

            <div class="form-group">
                <div class="pul-lft">
                    <input type="checkbox" class="checkbox" name="remember"><label>Remember Me</label>
                </div>

                <a href="{{ url('forgot') }}" class="link pul-rgt">
                    <i class="fa fa-support"></i>Lost your passward?
                </a>
            </div>

            <div class="form-group">
                <!--<button type="button" onclick="postLogin()" class="form-control w100 btn-primary" >LOGIN</button>-->
                <button class="form-control w100 btn-primary" >LOGIN</button>
            </div>
        </form>
        <div>
          <div id="caption"></div>
      </div>
  </div>
</div>
</div>
</div>



<div class="modal fade" id="imageTermsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div  class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4>Image Uploading Terms and Conditions</h4>
    </div>
    <div class="modal-body overload">
      By uploading an image, you guarantee that your use of the image does not infringe any rights or laws. You may review OnDemandSneakers design <a href="{{url('/design-guidelines')}}" >rejection reasons here</a>.
  </div>
</div>
</div>
</div>
</div>


<div class="modal fade" id="myPreviewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
    <!--Global Variables-->
    
    var G_imageView = 'left_factory';  
    var selectedProductName = '';
    var selectedTexture = '';
    var actualThumbnailPath = '';  
    
    var G_logoPath = '2021500480454.png';   
    var G_logo_x = '0';
    var G_logo_y = '0';
    var G_logo_width = '1';
    var G_logo_height = '1';

    var G_text = '0';
    var G_text_font = 'VeraSansMono-Oblique';
    var G_text_x = '0';
    var G_text_y = '0';
    var G_text_color = 'ffffff';
    var G_text_size = '1';
    
    var G_canvas_left = "";
    var G_canvas_right = "";
    var G_canvas_top = "";
    
    var G_product_id = '{{ $product->id }}';
    $('#g_product_id').val(G_product_id); // shm change
    var G_selected_texture_image = "";
    var G_selected_texture_image_div = "";
    
    var G_texture_size = document.getElementById('texture_scale').value;
    var G_sole_color = 'white';
    
    var G_pair_caption = "";
    var G_pair_texture_inside = "";
    var G_pair_texture_outside = "";
    var G_pair_texture_top = "";
    var G_canvas_image = "";

    $("#form_save_texture").submit(function(){

        var formData = new FormData($(this)[0]);
        var image_base_path ='{{ asset('') }}';
        var product_id = '{{ $product->id }}'

        var url = '{{ URL::to('/save-texture-image') }}';
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {

//        alert(data);
//        console.log(data);
//        if(G_selected_texture_image_div !== "")
//            document.getElementById(G_selected_texture_image_div).style.border = "";

var img = document.createElement('img');
img.src = image_base_path +'/uploads/texture_patterns/'+data['image_path'];
img.id = 'texture_img_'+data['id'];
img.style.width = '100px';
img.style.height = '100px';
img.style.border = "thick solid #cecece";
document.getElementById('texture_gallery').appendChild(img);
img.onclick = updateTextureImageParams(data['image_path'],'texture_img_'+data['id']);

G_selected_texture_image = data['image_path'];
$('#image_w').val(G_selected_texture_image);


        //document.getElementById('texture_img').src = image_base_path +'/uploads/texture_patterns/'+data;
        //getTexturedImage(data,product_id);

    },
    cache: false,
    contentType: false,
    processData: false
});

        return false;
    });

    <!--shm to add custom image as item image on base image of canvas-->
    $("#form_save_item_image").submit(function(){

        var formData = new FormData($(this)[0]);
        var image_base_path ='{{ asset('') }}';
        var product_id = '{{ $product->id }}'
        document.getElementById('preloader1').style.display = 'block';
        var url = '{{ URL::to('/save-custom-item-image') }}';
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            async: false,
            success: function (data) {

                var img = document.createElement('img');
                img.src = image_base_path +'/uploads/tool_items/'+data;
                img.style.width = '100px';
                img.style.height = '100px';
                img.onclick = addItemImage(data);
                document.getElementById('preloader1').style.display = 'none';
        //document.getElementById('item_gallery').appendChild(img);
        //document.getElementById('texture_img').src = image_base_path +'/uploads/texture_patterns/'+data;
        //getTexturedImage(data,product_id);

    },
    cache: false,
    contentType: false,
    processData: false
});

        return false;
    });



    function getTexturedImageNotUsed(texture_id,product_id){
        // alert('cool');
        var url = '{{ URL::to('/textured-image') }}';
        document.getElementById('preloader1').style.display = 'block'
        var comp_url = url + '/' + texture_id +'/'+product_id;

        $.ajax(
        {
            url: comp_url,
            type: "GET",
            data: '',
            success: function (data, textStatus, jqXHR) {

             if(data != ''){

                selectedProductName = data[0]['caption'];
                selectedTexture = data[0]['texture_path'];
                actualThumbnailPath = data[0]['actual'];

                showCanvas('{{ asset('uploads/liquid_pixel').'/'}}'+data[0]['liquid_pixel_image']);

            } else{

               alert('Files issue in Liquid pixel');

           }


           document.getElementById('preloader1').style.display = 'none'
       },
       error: function (jqXHR, textStatus, errorThrown) {
                           // error
                           alert('Loading external data error');
                           //console.log('error');
                       }
                   });

    }
    
    function getSelectedTexturedImage(texture_id,product_id){
        // shm script to apply change
        apply_change = false;
        if(product_id == 16)
            apply_change = true;
        var url;
        var comp_url;
        
        
            
        if(texture_id != ""){
            document.getElementById('preloader1').style.display = 'block';
            // if(selectedProductName == actualThumbnailPath){
                // Update All product Images  
                url = '{{ URL::to('/all-textured-image') }}';
                comp_url = url + '/' + texture_id +'/'+product_id+'/'+G_texture_size+'/'+G_sole_color;

                G_pair_texture_inside = texture_id;
                G_pair_texture_outside = texture_id;
                G_pair_texture_top = texture_id;

            /* } else {
                // Update Selected / Single product Image 
				if(G_imageView === "inside factory")
                    G_pair_texture_inside = texture_id;
                else if(G_imageView === "outside factory")
                    G_pair_texture_outside = texture_id;
                else if(G_imageView === "top factory")
                    G_pair_texture_top = texture_id;

                url = '{{ URL::to('/textured-image') }}';
                comp_url = url + '/' + texture_id +'/'+selectedProductName+'/'+actualThumbnailPath +'/'+ G_texture_size+'/'+G_sole_color+'/'+G_imageView+'/'+G_pair_texture_inside+'/'+G_pair_texture_outside+'/'+G_pair_texture_top+'/'+apply_change;

            } */
            // shm: above if-else condition has been commented to make sure change texture multilpe times without refreshing page

            // console.log('shm: getSelectedTexturedImage > '+selectedProductName +' == '+ actualThumbnailPath); 
            // return false;

            $.ajax(
            {
                url: comp_url,
                type: "GET",
                data: '',
                success: function (data, textStatus, jqXHR) {
                    if(data != ''){
//                         data = JSON.parse(JSON.stringify(data));
                        // console.log(data[0]);
                        if(selectedProductName == actualThumbnailPath){
                            // Update All product Images  
                                
                            selectedProductName = data[0]['caption'];
                            selectedTexture = data[0]['texture_path'];
                            actualThumbnailPath = data[0]['actual']; 
                            actualImageView = data[0]['image_view'];

                            // console.log('mhs'+selectedProductName+' '+selectedTexture+' '+actualThumbnailPath+' '+actualImageView);

                            var image = "";
                            var view = ""


                            for (i = 0; i < data.length; i++) { 
                                console.log(JSON.parse(JSON.stringify(data[i])))+'\n';
                                if (data[i]['image_view'].indexOf('factory') > -1) {
                                    
                                    image = data[i]['liquid_pixel_image'];
                                    view = data[i]['image_view'];

                                    updateSelectedImageVariable(data[i]['image_view'],data[i]['caption'],data[i]['texture_path'],data[i]['actual']);
                                    break;

                                }

                            }

                            showCanvas('{{ asset('uploads/liquid_pixel').'/'}}'+image,view);
                            $('#canvas_image').val('{{ asset('uploads/liquid_pixel').'/'}}'+image);
                            // updateGallery(data);
                            updateProductGallery(data,'all');

                        } else {
                            // console.log('else-shm: single');
                            // Update Selected product Image 
                   
                   
                            selectedProductName = data[0]['caption'];
                            selectedTexture = data[0]['texture_path'];
                            actualThumbnailPath = data[0]['actual'];
                            G_imageView = data[0]['image_view'];


                            showCanvas('{{ asset('uploads/liquid_pixel').'/'}}'+data[0]['liquid_pixel_image'],G_imageView);
                            // updateGallery2(data);
                            updateProductGallery(data[0],'single');
                            updateProductGallery(data[1],'single');
                            updateProductGallery(data[2],'single');


                           
                        }

                    } else {
                        alert('Files issue in Liquid pixel');

                   }

               },
               error: function (jqXHR, textStatus, errorThrown) {
                    alert('Loading external data error');
                }
            });

        } else 
            alert('Please Select any Image for product texture.');

    }


function getTexturedLogoImage(source_image,texture_path,product_name,logo_url,logo_x,logo_y,logo_width,logo_height){

    var url = '{{ URL::to('/textured-logo-image') }}';
    document.getElementById('preloader1').style.display = 'block';
    var comp_url = url + '/' + source_image +'/'+texture_path +'/'+product_name +'/'+logo_url +'/'+logo_x +'/'+logo_y +'/'+logo_width +'/'+logo_height;
    var logo_param = new Array();
    var text_param = new Array();


    logo_param['path'] = logo_url;
    logo_param['x'] = logo_x;
    logo_param['y'] = logo_y;
    logo_param['width'] = logo_width;
    logo_param['height'] = logo_height;

    $.ajax(
    {
        url: comp_url,
        type: "GET",
        data: '',
        success: function (data, textStatus, jqXHR) {

         if(data != ''){
            showUpdatedCanvas('{{ asset('uploads/liquid_pixel').'/'}}'+data[0]['liquid_pixel_image'],logo_param);
            updateProductGallery(data[0],'single');           
            // updateGallery(data);

            } else{                       
                alert('Files issue in Liquid pixel');
            }

        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Loading external data error');
        }
    });

}

function getTexturedLogoTextImage(source_image,texture_path,product_name,logo_url,logo_x,logo_y,logo_width,logo_height,text,text_font,text_size,text_color,text_x,text_y,texture_size,sole_color){

    var url = '{{ URL::to('/textured-logo-text-image') }}';
    document.getElementById('preloader1').style.display = 'block';
    var comp_url = url + '/' + source_image +'/'+texture_path +'/'+product_name +'/'+logo_url +'/'+logo_x +'/'+logo_y +'/'+logo_width +'/'+logo_height +'/'+text +'/'+text_font +'/'+text_size +'/'+text_color +'/'+text_x +'/'+text_y+'/'+texture_size+'/'+sole_color;

    var logo_param = new Array();
    var text_param = new Array();

    logo_param['path'] = logo_url;
    logo_param['x'] = logo_x;
    logo_param['y'] = logo_y;
    logo_param['width'] = logo_width;
    logo_param['height'] = logo_height;

    text_param['text'] = text;
    text_param['x'] = text_x;
    text_param['y'] = text_y;
    text_param['color'] = '#'+text_color;
    text_param['font'] = text_font;
    text_param['size'] = text_size;

    $.ajax(
    {
        url: comp_url,
        type: "GET",
        data: '',
        success: function (data, textStatus, jqXHR) {

            if(data != ''){
                // data = JSON.parse(data);
                showUpdatedCanvas('{{ asset('uploads/liquid_pixel').'/'}}'+data[0]['liquid_pixel_image'],logo_param,text_param);
                updateProductGallery(data[0],'single');           

            } else{                       
                alert('Files issue in Liquid pixel');
            }

    },
    error: function (jqXHR, textStatus, errorThrown) {
            alert('Loading external data error');
        }
    });

}



function makeTexturedImageFromCanvas(){

    var data = [];
    var url = '{{ URL::to('/textured-from-canvas') }}';
    document.getElementById('preloader1').style.display = 'block';
    
    var formdata = $("#form_apply_design").serialize();
    

    var logo_param = new Array();
    var text_param = new Array();

    $.ajax(
    {
        url: url,
        type: "POST",
        data: formdata,
        success: function (data, textStatus, jqXHR) {
        if(data != ''){
            // console.log(data);			
            // showUpdatedCanvas('{{ asset('uploads/liquid_pixel').'/'}}'+data[0]['liquid_pixel_image'],logo_param,text_param);
            updateProductGallery(data[0],'single'); 

            document.getElementById('preloader1').style.display = 'none';

        } else {                       
            alert('Files issue in Liquid pixel');
        }

    },
    error: function (jqXHR, textStatus, errorThrown) {
        alert('Loading external data error');
        
    }
    });

}

/* ***<!--var js_parsing_methods = 'json.stringify(), json.parse()';-->
<!--JSON.stringify turns a Javascript object into JSON text and stores that JSON text in a string.
JSON.stringify() is to create a JSON string out of an object/array.
--------------------------------------------------------------------
JSON.parse turns a string of JSON text into a Javascript object.
JSON.parse() is for "parsing" something that was received as JSON. 
They are the inverse of each other. -->
*** */


// shm: this func is used to modify gallery images
function updateProductGallery(data,type){

    if(type == "all"){

        for (i = 0; i < data.length; i++) { 
            var item_id = data[i]['image_view'];
            document.getElementById(item_id).src = '{{ asset('uploads/liquid_pixel').'/'}}'+data[i]['liquid_pixel_image'];
            var image_name = "{{ asset('uploads/liquid_pixel').'/'}}";
            var image_path = image_name + data[i]['liquid_pixel_image'];
            if(data[i]['editable'] === true) {
                // console.log('test shm: '+data[i]['image_view']+"','"+image_path+'\n'+data[i]['image_view']+"','"+data[i]['caption']+"','"+data[i]['texture_path']+"','"+data[i]['actual']);
                document.getElementById(item_id).setAttribute('onclick',"showWorkingCanvas('"+data[i]['image_view']+"','"+image_path+"'),updateSelectedImageVariable('"+data[i]['image_view']+"','"+data[i]['caption']+"','"+data[i]['texture_path']+"','"+data[i]['actual']+"')");         
            }
            else {
                // console.log('test2 shm: '+data[i]['liquid_pixel_image']);
                document.getElementById(item_id).setAttribute('onclick',"showPreviewModal('"+data[i]['liquid_pixel_image']+"')");     
            }   
        }

    } else {
        // shm script to update factory template w.r.t orb response
        var id = data['selected_image_view'];
        var src = data['factory_url'];
        var lrg_src = data['large_factory_url'];
        var orb_large_req = data['orb_large_req'];
        $('#design_orb_request').val(orb_large_req);
        $('#cart_orb_request').val(orb_large_req);
        if(lrg_src != ''){
            // $('#factory_list').removeAttr("style");
            $("img[id='large_factory_img']").attr("src", lrg_src);
            $('#download').attr('href', lrg_src);
        }
        $("img[id='"+id+"']").attr("src", src);

        var item_id = data['image_view'];

        var image_path = '{{ asset('uploads/liquid_pixel').'/'}}'+data['liquid_pixel_image'];
        document.getElementById(item_id).src = image_path;

        if(data['editable'] === true) {
            // console.log('test shm: '+data['image_view']+"','"+image_path+'\n'+data['image_view']+"','"+data['caption']+"','"+data['texture_path']+"','"+data['actual']); 
            document.getElementById(item_id).setAttribute('onclick',"showWorkingCanvas('"+data['image_view']+"','"+image_path+"'),updateSelectedImageVariable('"+data['image_view']+"','"+data['caption']+"','"+data['texture_path']+"','"+data['actual']+"')");     
        }
        else {
            // console.log('test2 shm: '+data['liquid_pixel_image']);
            document.getElementById(item_id).setAttribute('onclick',"showPreviewModal('"+data['liquid_pixel_image']+"')");  
        }

        if(data['image_view'] === "inside factory")
            G_canvas_left = "";
        else if(data['image_view'] === "outside factory")
            G_canvas_right = "";
        else if(data['image_view'] === "top factory")
            G_canvas_top = "";

    }

}

function updateSelectedImageVariable(view,caption,texture_path,actual){
    selectedProductName = caption;
    selectedTexture = texture_path;
    actualThumbnailPath = actual;
    G_imageView  = view;
    // console.log('shm: updateSelectedImageVariable > '+selectedProductName+' - '+selectedTexture+' - '+actualThumbnailPath+' - '+G_imageView);
}

var loginForm = $("#loginForm");

loginForm.submit(function(e) {
   e.preventDefault();
   var formdata = $("#loginForm").serialize();


   $.ajax(
   {
    url: "{{ URL::to('/postLoginPopup') }}",
    type: "POST",
    dataType:'json',
    data: formdata,
    success: function (response, textStatus, jqXHR) {
                        // alert(JSON.stringify(response.error));
                        if (response.error == 1) {

                            var errorsHtml = '<div class="alert alert-danger"><ul>';

                            $.each(response.errors, function (key, value) {
                        errorsHtml += '<li>' + value + '</li>'; //showing only the first error.
                    });

                            errorsHtml += '</ul></div>';
                            $('#errors_login').html(errorsHtml).show();
                        } else
                        {
//                    alert(JSON.stringify(response));
$('#myModal').modal('toggle');
renderImageForCart();
document.getElementById('form_save_design').submit();

}

}
});

});

</script>
<script>


$(document).ready(function(){
	$(".canvas-container").addClass("fit-to-screen");	
});


    function showModal(){
        $('#myModal').modal('show');
    }

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

    function updateTextureImageParams(texture_image,div_id){

        G_selected_texture_image = texture_image;
		$('#image_w').val(G_selected_texture_image);
        if(G_selected_texture_image_div !== "")
            document.getElementById(G_selected_texture_image_div).style.border = "";
        document.getElementById(div_id).style.border = "thick solid #cecece";
        G_selected_texture_image_div = div_id;
    }

    function getHtml(){

        document.getElementById("html_data").value = $('html').html();
        //console.log( $('html').html());

    }

    function showImageTerms(){

       $('#imageTermsModal').modal('show');


    }

    function hideLoader(){
        alert("canvas loaded");
    }

    function updateSoleColor(){
        G_sole_color = document.getElementById("shoes_sole").value;
        getSelectedTexturedImage(G_selected_texture_image,G_product_id); 
    }

    <!--shm: to preview factory changes on user end-->
    function showPreviewModal(img){

        var image_path = '{{ asset('uploads/liquid_pixel/')}}'+'/'+img;
        var modalImg = document.getElementById('modal_image');
        modalImg.src = image_path;
        // var captionText = document.getElementById("caption");

        modalImg.src = image_path;
        $('#myPreviewModal').modal('show');
    }

	
	function toolBarRemove(that) {
    $("#toolArea").removeClass("show");
    $(".viewTool").removeClass("is-active");
}

	
function toolBarToggle(that) {
    $("#toolArea").toggleClass("show");
    $(".viewTool").toggleClass("is-active");
}

	
$(".viewTool").on("click", function(){
    toolBarToggle(this);
});


$("#fitToScreen").on("click", function(){
	
	if(!$(this).hasClass("is-active") && $("#toolArea").hasClass("show") ){
		console.log("dddddd");
			toolBarToggle(this);
		}
		
    $(".canvas-container").toggleClass("fit-to-screen");
    $(this).toggleClass("is-active");
		
})

$("#apply_changes").on("click", function(){
	$("html, body").animate({ scrollTop: $(document).height()-$(window).height() });
});
 

</script>

@include('front/customization_tool_js/script')
@endsection

<script src="{{asset('front/tool/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front/tool/js/viewportchecker.js')}}"></script>
<script src="{{asset('front/tool/js/kodeized.js')}}"></script>

<?php
$canvas_image = asset('uploads/products/').'/'.$product->image;
$canvas_image_title = "product";
// $connect_LP = 'false';
$connect_LP = 'true'; // temp set

if(isset($productImages[0]->image)){
   $canvas_image = asset('uploads/products_images/').'/'.$productImages[0]->image;
   $connect_LP = 'true';
}
?>

<script>

    $(document).ready(function () {
       
//       canvas.setWidth($('.canvas-container').width());
        $('.canvas-container').css("height", "672px !important");
        $('.canvas-container').attr("height",672);
        $('.canvas-container').height(672);
        
        var image = "{{ $canvas_image }}";
        var view = "{{ $canvas_image_title }}";
        actualThumbnailPath = 'default';
        selectedProductName = 'default';

        showCanvas(image,view);
        disableObjectButtons();
        disableTextControl();

    });
//

////////////////// INITIALIZE CANVAS //////////////////////
var canvas = this.__canvas = new fabric.CanvasWithViewport("c", { preserveObjectStacking: true });
var canvas_bg = this.__canvas = new fabric.CanvasWithViewport("d", { preserveObjectStacking: true });
canvas.isGrabMode = false;
canvas.canvas_bg = false;
var context = canvas.getContext('2d');

canvas.calcOffset();

        /////////////////////////// IMAGE UPLOADING ///////////////////
//        document.getElementById('imgLoader').onchange = function handleImage(e) {
//            var reader = new FileReader();
//            reader.onload = function (event) {
//                
//                var imgObj = new Image();
//                imgObj.src = event.target.result;
//                imgObj.onload = function () {
//                    // start fabricJS stuff
//                    var image = new fabric.Image(imgObj);
//                    image.set({
//                        left: 250,
//                        top: 235,
//                    });
//
//                    var newSize = scaleSize(250, 400, image.width, image.height);
//                    // alert('New Width: ' + newSize[0] + ', New Height: ' + newSize[1]);
//                    image.width = newSize[0];
//                    image.height = newSize[1];
//                    canvas.add(image);
//                }
//            }
//            
//            reader.readAsDataURL(e.target.files[0]);
//             updateModifications(true);
//        }


function scaleSize(maxW, maxH, currW, currH) {

    var ratio = currH / currW;

    if (currW >= maxW && ratio <= 1) {
        currW = maxW;
        currH = currW * ratio;
    } else if (currH >= maxH) {
        currH = maxH;
        currW = currH / ratio;
    }

    return [currW, currH];
}
        //////////////////////////////////////////////////////////
        
        /////////////////////////// Texture Image Uploading ///////////////////
//        document.getElementById('textureLoader1').onchange = function handleImage(e) {
//          
//            var reader = new FileReader();
//            reader.onload = function (event) {
//                var imgObj = new Image();
//                imgObj.src = event.target.result;
//                imgObj.onload = function () {
//
//                     document.getElementById('texture_data').value = imgObj.src;
//                    // uploadTextureImage():
//                }
//            }
//          reader.readAsDataURL(e.target.files[0]);
//          return true;
//        }
////////////////////////////////////////////////////////////////////////////////////
function renderImageForFactory(){
    var orb_large_req = $('#cart_orb_request').val();
    var size = $('#attributes_2').val();
    var size_arr = size.split('_'); 
    var dir = size_arr[0].toLowerCase();
    if(orb_large_req !=''){
            var url = orb_large_req.replace(/replace/g, dir);
            window.open(url, 'download');	
    }
}

function renderImageForCart() {

    canvas.deactivateAll().renderAll();
    document.getElementById('design_data').value = JSON.stringify(canvas.toDatalessJSON());
    document.getElementById('image_data').value = canvas.toDataURL();
    document.getElementById('image_data2').value = canvas.toDataURL(); 
    return true;
}

function saveImg() {

    canvas.deactivateAll().renderAll();
    document.getElementById('image_data').value = canvas.toDataURL();

    var img = canvas.toDataURL("image/png");
    if (!fabric.Canvas.supports('toDataURL')) {
        alert('This browser doesn\'t provide means to serialize canvas to an image');
    }
    else {
        window.open(canvas.toDataURL('png'));
    }
}

function saveImgData() {

    canvas.deactivateAll().renderAll();
    document.getElementById('image_data').value = canvas.toDataURL();

}

<!-- shm function to get coordinates of active object-->
function getCoords(oCoords) {
    return {
      tl: new fabric.Point(oCoords.tl.x, oCoords.tl.y),
      tr: new fabric.Point(oCoords.tr.x, oCoords.tr.y),
      bl: new fabric.Point(oCoords.bl.x, oCoords.bl.y),
      br: new fabric.Point(oCoords.br.x, oCoords.br.y)
    }
  }

function RemoveSelectedItems() {

    if (canvas.getActiveGroup()) {
        canvas.getActiveGroup().forEachObject(function (o) {
            canvas.remove(o)
        });
        canvas.discardActiveGroup().renderAll();
    } else {
        canvas.remove(canvas.getActiveObject());
    }
    
    updateModifications(true);

}

function RemoveLastItem() {

    var canvas_objects = canvas._objects;
    if (canvas_objects.length !== 0) {
            var last = canvas_objects[canvas_objects.length - 1]; //Get last object
            canvas.remove(last);
            canvas.renderAll();
        }
    }

        function ZoomIn() {

            if (canvas.viewport.zoom < 1.6)
                canvas.setZoom(canvas.viewport.zoom * 1.1);
        }

        function ResetZoom() {
            canvas.setZoom(1);
            // canvas_bg.setZoom(1);
        }

        function ZoomOut() {

            if (canvas.viewport.zoom > 0.64)
                canvas.setZoom(canvas.viewport.zoom / 1.1);

        }

        function GrabModeOn() {

            canvas.isGrabMode = true;

        }

        function GrabModeOff() {

            canvas.isGrabMode = false;

        }

        function RemoveAllItem() {
            canvas.clear();
        }

        function AddText() {


        var custom_text = document.getElementById("my_text").value;
        var text_color = document.getElementById("text_color_code").value;

        var stroke_color = document.getElementById("stroke_color_code").value;
        var stroke_size = document.getElementById("stroke_size_selector").value;
        //            alert('shm: '+custom_text+' | '+document.getElementById("font_selector").value);
        if (custom_text != "") { 
            var custom_text_obj = new fabric.IText(custom_text, {
                    // var custom_text_obj = new fabric.Text(custom_text, {
                        fontSize: document.getElementById("size_selector").value,
                        fontFamily: document.getElementById("font_selector").value,
                        originX: 'left',
                        originY: 'top',
                        name: 'itext ' + window.counter,
                        fill: text_color,
                        lineHeight: 1.1,
                        left: 340,
                        top: 300,
                        borderColor:'#fbb802',
                        cornerColor:'#fbb802',
                    // stroke:stroke_color,
                    // strokeWidth:1,
                    applicableFonts: ["Arial", "Times New Roman", "Currier New", "Tahoma"]
                });


    G_text = custom_text;
    G_text_font = document.getElementById("font_selector").value;
    G_text_x = 340;
    G_text_y = 300;
    G_text_color = text_color;
    G_text_size = document.getElementById("size_selector").value;
//                alert('shm2: '+G_text+' | '+G_text_font);
//                embeded shm script
$("#text").val(G_text);
$("#text_font").val(G_text_font);
$("#text_x").val(G_text_x);
$("#text_y").val(G_text_y);
$("#text_point_size").val(G_text_size);
$("#text_color").val(G_text_color);
$("#send_orb_req").removeAttr("style");

                //document.getElementById("my_text").value = "";
                document.getElementById("my_text").value = "";

                //custom_text_obj.setStrokeWidth('1');
                //custom_text_obj.setStroke(stroke_color);
                canvas.add(custom_text_obj);
            }
            updateModifications(true);
            canvas.counter++;
            //newleft += 100;
        }

        function addItemImage(img) {           

            var path = '{{ asset('uploads/tool_items')."/" }}'+img;
            
            logoPath = img;
            
            

fabric.Image.fromURL(path, function (img) {

    var newSize = scaleSize(50, 50, img.width, img.height);
    img.scale(1).set({
        left: 0,
        top: 0,
        originX: 'left',
        originY: 'top',
        name: logoPath,
        width:img.width,
        height:img.height,
        borderColor:'#fbb802',
        cornerColor:'#fbb802'
    
    });
    
    
    G_logoPath = logoPath;   
    G_logo_x = 340;
    G_logo_y = 300;
    // G_logo_width = newSize[0]*2;
    // G_logo_height = newSize[1]*2;
    G_logo_width = img.width;
    G_logo_height = img.height;
    // alert(img.width+ ' - ' + img.height+' \n '+G_logo_width+' - '+G_logo_height);
    $("#item_x").val(G_logo_x);
    $("#item_y").val(G_logo_y);
    $("#item_w").val(G_logo_width);
    $("#item_h").val(G_logo_height);              
    $("#item_src").val(G_logoPath);
    $("#canvas_image").val(G_canvas_image);
    $("#send_orb_req").removeAttr("style");
    
// canvas.add(img).setActiveObject(shape);
canvas.add(img);
canvas.renderAll();
updateModifications(true);
canvas.counter++;
});
}

//        shm: default func until any texture is applied on images    
function showCanvas(image,view) {
    canvas.setZoom(1);
    canvas.clear();
    disableObjectButtons();

    fabric.Object.prototype.transparentCorners = true;
<?php  if(count($savedDesign) == '0'){?>
    
    var image11 = "{{ asset('uploads/products/').'/'.$product->image }}";
    document.getElementById('preloader1').style.display = 'block';
    fabric.Image.fromURL(image, function (bgImg) {
        bgImg.scaleX = 1;
        bgImg.scaleY = 1;
        canvas.add(bgImg);
        canvas.item(0).selectable = false;
        canvas.item(0).name = view;
        bgImg.center();
        document.getElementById('preloader1').style.display = 'none';
});


    canvas.selectionColor = 'rgba(0,215,0,1)';
    canvas.selectionBorderColor = 'red';
    canvas.selectionLineWidth = 0.6;

            canvas.selection = false; // disable group selection
            // canvas1.setBackgroundImage('shirt1.jpg', canvas.renderAll.bind(canvas1));

            <?php  } else {?>
                
                var json = <?php echo $savedDesign[0]->data ?>;
                canvas.loadFromJSON(json, canvas.renderAll.bind(canvas), function (o, object) {
                    console.log(object);
                });
//            canvas.renderAll();

<?php } ?>

}


function showUpdatedCanvas(image,logo_param,text_param) {

    disableObjectButtons();
    canvas.setZoom(1);
//    canvas.clear();
    fabric.Object.prototype.transparentCorners = true;
    var image11 = "{{ asset('uploads/products/').'/'.$product->image }}";

    fabric.Image.fromURL(image, function (bgImg) {
        bgImg.scaleX = 1;
        bgImg.scaleY = 1;
        canvas.clear();
        canvas.add(bgImg);
        canvas.item(0).selectable = false;
        canvas.item(0).name = 'aamir';
        bgImg.center();
        bgImg.setCoords(); //  new param by shm to fix drag issue 

    });



    canvas.selectionColor = 'rgba(0,255,0,0.9)';
    canvas.selectionBorderColor = 'blue';
    canvas.selectionLineWidth = 0.2;

            canvas.selection = false; // disable group selection
            
            var path = '{{ asset('uploads/tool_items')."/" }}' + logo_param['path']; 

            var delayMillis = 9000; 

            setTimeout(function() {
                
                if(logo_param['width'] != '1'){

                    fabric.Image.fromURL(path, function (img) {

                        img.scale(1).set({
                            left: logo_param['x'],
                            top: logo_param['y'],
                            originX: 'left',
                            originY: 'top',
                            opacity:0.1,
                            selection:true,
                            name: logo_param['path'],
                            width:logo_param['width'],
                            height:logo_param['height'],
                        });
                        
                        canvas.add(img);
                        canvas.renderAll(); 
                        
                    });
                }
                
                if(text_param['size'] != '1'){
                   
                 var custom_text_obj = new fabric.IText(text_param['text'], {
                    // var custom_text_obj = new fabric.Text(custom_text, {
                        fontSize: text_param['size'],
                        fontFamily: text_param['font'],
                        originX: 'left',
                        originY: 'top',
                        name: 'itext ' + window.counter,
                        fill: text_param['color'],
                        lineHeight: 1.1,
                        opacity:0.1,
                        left: text_param['x'],
                        top: text_param['y'],
                    // stroke:stroke_color,
                    // strokeWidth:1,
                    applicableFonts: ["Arial", "Times New Roman", "Currier New", "Tahoma"]
                });

                 document.getElementById("my_text").value = "";
                 canvas.add(custom_text_obj);
                 canvas.renderAll();
                 
                 
             }
             document.getElementById('preloader1').style.display = 'none';     
             
         }, delayMillis); 
            
        }
        
        

        function sendBack() {
            // draw_grid('251');
            var activeObject = canvas.getActiveObject();
            if (canvas.getObjects().indexOf(activeObject) != 1) {
                if (activeObject)
                    canvas.sendBackwards(activeObject);
            }
            
            updateModifications(true);
        }

        function sendFront() {

            var activeObject = canvas.getActiveObject();
            if (activeObject)
                canvas.bringForward(activeObject);
            
            updateModifications(true);

        }

        function flipHorizontal() {
            var activeObject = canvas.getActiveObject();
            if (activeObject) {
                if (activeObject.flipY)
                    activeObject.setFlipY(false);
                else
                    activeObject.setFlipY(true);
            }
            canvas.renderAll();
            updateModifications(true);
        }

        function flipVertical() {
            var activeObject = canvas.getActiveObject();
            if (activeObject) {
                if (activeObject.flipX)
                    activeObject.setFlipX(false);
                else
                    activeObject.setFlipX(true);
            }
            canvas.renderAll();
            updateModifications(true);
        }

        function changeOpacity(value) {

            var activeObject = canvas.getActiveObject();

            if (activeObject) {
                activeObject.set({
                    opacity: value
                });
            }

            canvas.renderAll();
            updateModifications(true);

        }

function changeTextureScale(value) {


    console.log(value);
    G_texture_size = value;


}

        /////////////////////////////////////////////////////////////

        function copy() {
            if (canvas.getActiveGroup()) {
                for (var i in canvas.getActiveGroup().objects) {
                    var object = fabric.util.object.clone(canvas.getActiveGroup().objects[i]);
                    object.set("top", object.top + 5);
                    object.set("left", object.left + 5);
                    copiedObjects[i] = object;
                }
            }
            else if (canvas.getActiveObject()) {
                var object = fabric.util.object.clone(canvas.getActiveObject());
                object.set("top", object.top + 5);
                object.set("left", object.left + 5);
                copiedObject = object;
                copiedObjects = new Array();
            }
        }

        function paste() {
            if (copiedObjects.length > 0) {
                for (var i in copiedObjects) {
                    canvas.add(copiedObjects[i]);
                }
            }
            else if (copiedObject) {
                canvas.add(copiedObject);
            }
            canvas.renderAll();
        }

        function duplicateObject() {

            copy();
            paste();

        }

        function disableObjectButtons() {


            document.getElementById("obj_controls").style.display = 'none';
            document.getElementById("sendBack").disabled = true;
            document.getElementById("sendFront").disabled = true;
            document.getElementById("flipHorizontal").disabled = true;
            document.getElementById("flipVertical").disabled = true;
            document.getElementById("duplicate").disabled = true;
            document.getElementById("delete").disabled = true;


        }

        function activeObjectButtons() {

            document.getElementById("obj_controls").style.display = 'block';

            document.getElementById("sendBack").disabled = false;
            document.getElementById("sendFront").disabled = false;
            document.getElementById("flipHorizontal").disabled = false;
            document.getElementById("flipVertical").disabled = false;
            document.getElementById("duplicate").disabled = false;
            document.getElementById("delete").disabled = false;


        }
        
        canvas.on('mouse:down', function (options) {
            if (typeof options.target === "undefined" || options.target.width == "1982") {

                disableObjectButtons();
            } else {
                activeObjectButtons();
                removeActiveClass();

                document.getElementById('opacity_range').value = options.target.opacity;

                if (options.target.type == 'i-text') {
                    
                    if (options.target.fontStyle == "italic")
                        $('#btn_italic').addClass("active");

                    if (options.target.fontWeight == "bold")
                        $('#btn_bold').addClass("active");
                    
                    if (options.target.textDecoration == "underline")
                        $('#btn_underline').addClass("active");                       
                    
                    if (options.target.shadow != null)
                        $('#btn_shadow').addClass("active");
                    
                    if (options.target.textDecoration == "overline")
                        $('#btn_overline').addClass("active");
                    
                    if (options.target.textDecoration == "line-through")
                        $('#btn_linethrough').addClass("active");
                    
                    document.getElementById("text_color_code").value = options.target.fill;
                    document.getElementById("size_selector").value = options.target.fontSize;
                    document.getElementById("font_selector").value = options.target.fontFamily
                    
                    normalTextControl();
                } else {
                    disableTextControl();
                }
                //     document.getElementById('angle-control').value = options.target.angle;
            }
            
//            new shm coords test script
            var obj = options.target;
            // if object is too big ignore
            /* if(obj.currentHeight > obj.canvas.height || obj.currentWidth > obj.canvas.width){
                return;
            } */        
            obj.setCoords();        
            // top-left  corner
            if(obj.getBoundingRect().top < 0 || obj.getBoundingRect().left < 0){
                obj.top = Math.max(obj.top, obj.top-obj.getBoundingRect().top);
                obj.left = Math.max(obj.left, obj.left-obj.getBoundingRect().left);
            }
            // bot-right corner
            if(obj.getBoundingRect().top+obj.getBoundingRect().height  > obj.canvas.height || obj.getBoundingRect().left+obj.getBoundingRect().width  > obj.canvas.width){
                obj.top = Math.min(obj.top, obj.canvas.height-obj.getBoundingRect().height+obj.top-obj.getBoundingRect().top);
                obj.left = Math.min(obj.left, obj.canvas.width-obj.getBoundingRect().width+obj.left-obj.getBoundingRect().left);
            }

        });

function clickListener(el) {
    var button = $(el).attr('id');
    var activeObject = canvas.getActiveObject();
    var text_color = document.getElementById("text_color_code").value;
//    var svg_color = document.getElementById("svg_color_code").value;
    var text_bg_color = document.getElementById("text_bg_color_code").value;
    var font_size = document.getElementById("size_selector").value;
    var font_family = document.getElementById("font_selector").value;

    var stroke_color = document.getElementById("stroke_color_code").value;
    var stroke_size = document.getElementById("stroke_size_selector").value;

    var object = document.getElementById($(el).attr('id'));

    if (activeObject.type == 'i-text' && object.className.indexOf('active') == '-1') {

                object.classList.add('active');
                switch (button) {
                    case "btn_bold":
                    activeObject.set("fontWeight", "bold");
                        //$('#btn_bold').removeClass("active");
                        break;
                        case "btn_italic":
                        activeObject.set("fontStyle", "italic");
                        // $('#btn_italic').addClass("active");
                        break;
                        case "btn_underline":
                        activeObject.set("textDecoration", "underline");
                        break;
                        case "btn_shadow":
                        activeObject.set("shadow", "rgba(0,0,0,0.2) 0 0 5px");
                        break;
                        case "btn_overline":
                        activeObject.set("textDecoration", "overline");
                        break;
                        case "btn_linethrough":
                        activeObject.set("textDecoration", "line-through");
                        break;
                        case "text_bg_color_code":
                        activeObject.setTextBackgroundColor(text_bg_color);
                        break;
                        case "text_color_code":
                        activeObject.setColor(text_color);
                        break;
                        case "font_selector":
                        
                        activeObject.set("fontFamily", font_family);
                        break;

                        case "size_selector":
                        activeObject.set("fontSize", font_size);
                        break;
                        
                        case "btn_stroke_toggle":
                        activeObject.set("strokeWidth", stroke_size);
                        activeObject.set("stroke", stroke_color);
                        document.getElementById("stroke_color_code").disabled = false;
                        document.getElementById("stroke_size_selector").disabled = false;
                        break;

                        case "svg_color_code":
                        activeObject.paths.forEach(function (path) {
                            path.fill = svg_color;
                        });
                        break;

                        

                    }

                } else if (activeObject.type == 'i-text' && object.className.indexOf('active') != '-1') {

                    object.classList.remove("active");
                    switch (button) {
                        case "btn_bold":
                        activeObject.set("fontWeight", "");
                        //$('#btn_bold').removeClass("active");
                        break;
                        case "btn_italic":
                        activeObject.set("fontStyle", "");
                        // $('#btn_italic').addClass("active");
                        break;
                        case "btn_underline":
                        activeObject.set("textDecoration", "");
                        break;
                        case "btn_shadow":
                        activeObject.set("shadow", "");
                        break;
                        case "btn_overline":
                        activeObject.set("textDecoration", "");
                        break;
                        case "btn_linethrough":
                        activeObject.set("textDecoration", "");
                        break;
                        case "text_bg_color_code":
                        activeObject.setBackgroundColor(text_bg_color);
                        break;
                        case "text_color_code":
                        activeObject.setColor(text_color);
                        break;
                        case "font_selector":
                        activeObject.set("fontFamily", font_family);
                        break;
                        case "size_selector":
                        activeObject.set("fontSize", font_size);
                        break;

                        case "btn_stroke_toggle":
                        activeObject.set("strokeWidth", "0.1");
                        activeObject.set("stroke", "");
                        document.getElementById("stroke_color_code").disabled = true;
                        document.getElementById("stroke_size_selector").disabled = true;
                        break;

                    }
                }

                canvas.renderAll();
            }

            function setImageColor() {

                var svg_color = document.getElementById("svg_color_code").value;
                var activeObject = canvas.getActiveObject();
                activeObject.setFill(svg_color);
            //activeObject.setFill(svg_color);

            // for (var i = 0; i < activeObject.path.length; i++) {
            //     // activeObject.path[i].set("fill", svg_color);
            //     activeObject.path[i].setColor(svg_color);
            // }

            //     color = $(this).val();
            //
            // activeObject.paths.forEach(function(path) {path.fill = svg_color});
            canvas.renderAll();
        }

        function setStrokeColor() {
            
            var activeObject = canvas.getActiveObject();
            var stroke_color = document.getElementById("stroke_color_code").value;
            activeObject.set("stroke", stroke_color);
            
            var stroke_size = document.getElementById("stroke_size_selector").value;
            
            activeObject.set("strokeWidth", stroke_size);
            
            canvas.renderAll();
        }
        
        function setStrokeSize() {

            var activeObject = canvas.getActiveObject();
            var stroke_size = document.getElementById("stroke_size_selector").value;
            activeObject.set("strokeWidth", stroke_size);
            
            var stroke_color = document.getElementById("stroke_color_code").value;
            activeObject.set("stroke", stroke_color);
            
            canvas.renderAll();
        }

        function changeFillColor(type) {

            var shape_color = document.getElementById("shape_color_code").value;
            var svg_color = document.getElementById("svg_color_code").value;

            var activeObject = canvas.getActiveObject();

            if (activeObject.type == 'path-group') {
                activeObject.setFill(svg_color);
            }
            else {
                activeObject.setFill(shape_color);
            }

            canvas.renderAll();
        }

        function disableTextControl() {

            document.getElementById("btn_bold").disabled = true;
            document.getElementById("btn_italic").disabled = true;
            document.getElementById("btn_underline").disabled = true;
            document.getElementById("btn_shadow").disabled = true;
            document.getElementById("btn_overline").disabled = true;
            document.getElementById("btn_linethrough").disabled = true;

//            document.getElementById("font_selector").disabled = true;
//            document.getElementById("text_color_code").disabled = true;
//            document.getElementById("size_selector").disabled = true;
            // document.getElementById("btn_addtext").disabled = true;
            document.getElementById("btn_stroke_toggle").disabled = true;
            document.getElementById("stroke_color_code").disabled = true;
            document.getElementById("stroke_size_selector").disabled = true;
//            document.getElementById("btn_align_left").disabled = true;
//            document.getElementById("btn_align_center").disabled = true;
//            document.getElementById("btn_align_right").disabled = true;
            // document.getElementById("text_bg_toggle").disabled = true;
            document.getElementById("text_bg_color_code").disabled = true;

        }

        function normalTextControl() {

            document.getElementById("btn_bold").disabled = false;
            document.getElementById("btn_italic").disabled = false;
            document.getElementById("btn_underline").disabled = false;
            document.getElementById("btn_shadow").disabled = false;
            document.getElementById("btn_overline").disabled = false;
            document.getElementById("btn_linethrough").disabled = false;

            document.getElementById("font_selector").disabled = false;
            document.getElementById("text_color_code").disabled = false;
            document.getElementById("size_selector").disabled = false;
            document.getElementById("btn_addtext").disabled = false;
            document.getElementById("btn_stroke_toggle").disabled = false;
            document.getElementById("stroke_color_code").disabled = false;
            document.getElementById("stroke_size_selector").disabled = false;
//            document.getElementById("btn_align_left").disabled = false;
//            document.getElementById("btn_align_center").disabled = false;
//            document.getElementById("btn_align_right").disabled = false;xt
            // document.getElementById("text_bg_toggle").disabled = false;
            document.getElementById("text_bg_color_code").disabled = false;

        }

        function removeActiveClass() {

            document.getElementById("btn_bold").classList.remove("active");
            document.getElementById("btn_italic").classList.remove("active");
            document.getElementById("btn_underline").classList.remove("active");
            document.getElementById("btn_shadow").classList.remove("active");
            document.getElementById("btn_overline").classList.remove("active");
            document.getElementById("btn_linethrough").classList.remove("active");

            // document.getElementById("font_selector").disabled = false;
            // document.getElementById("text_color_code").disabled = false;
            // document.getElementById("size_selector").disabled = false;
            // document.getElementById("btn_addtext").disabled = false;
            document.getElementById("btn_stroke_toggle").classList.remove("active");
            // document.getElementById("stroke_color_code").disabled = false;
            // document.getElementById("stroke_size_selector").disabled = false;
//            document.getElementById("btn_align_left").classList.remove("active");
//            document.getElementById("btn_align_center").classList.remove("active");
//            document.getElementById("btn_align_right").classList.remove("active");
            // document.getElementById("text_bg_toggle").classList.remove("active");
            // document.getElementById("text_bg_color_code").disabled = false;

        }

        function saveShirtDesign() {
            console.log(JSON.stringify(canvas.toDatalessJSON()));

        }

        function loadFromJson() {
            var json = '{"objects":[{"type":"image","originX":"left","originY":"top","left":82.5,"top":35,"width":500,"height":500,"fill":"rgb(0,0,0)","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","src":"http://localhost/merchwiz/uploads/products/2731494917722.png","filters":[],"crossOrigin":""},{"type":"image","originX":"center","originY":"center","left":510.11,"top":317,"width":151,"height":92,"fill":"rgb(0,0,0)","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":0.44,"scaleY":0.44,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","src":"http://localhost/merchwiz/uploads/tool_items/3571494319584.svg","filters":[],"crossOrigin":""},{"type":"i-text","originX":"left","originY":"top","left":76,"top":331.04,"width":91.16,"height":26,"fill":"#ffffff","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":2.63,"scaleY":4.04,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","text":"weewewe","fontSize":"20","fontWeight":"bold","fontFamily":"helvetica","fontStyle":"","lineHeight":1.3,"textDecoration":"","textAlign":"left","path":null,"textBackgroundColor":"","useNative":true,"styles":{}}],"background":""}'
        
            canvas.loadFromJSON(json, canvas.renderAll.bind(canvas), function (o, object) {
            console.log('loadFromJson: '+object);
        });


canvas.renderAll();


}


        //////// Keyboard keys functions /////
        $(document).bind("keydown", function (e) {
            var factor = 5;
            var activeObject = canvas.getActiveObject();


            switch (e.keyCode) {
                    //// arrows key for position ////
                    case 37:
                    activeObject.left -= factor;
                    canvas.renderAll();
                    break;
                    case 38:
                    activeObject.top -= factor;
                    canvas.renderAll();
                    break;
                    case 39:
                    activeObject.left += factor;
                    canvas.renderAll();
                    break;
                    case 40:
                    activeObject.top += factor;
                    canvas.renderAll();
                    break;

                    ///////////////////////////////////////////

                case 46: // delete key
                if (canvas.getActiveGroup()) {
                    canvas.getActiveGroup().forEachObject(function (o) {
                        canvas.remove(o)
                    });
                    canvas.discardActiveGroup().renderAll();
                } else {
                    canvas.remove(canvas.getActiveObject());
                }
                break;
            }
//            alert('shm drag1');
canvasDragBoundries();
updateModifications(true);
//            canvas.counter++;
            //newleft += 100;
            
        });


//////////////////////////////// BOUDDRIES LIMITATIONS ///////////////////////


function canvasDragBoundries(){
    
    var startX = 0;
    var endX = 1982;
    var startY = 0;
    var endY = 972
    
    var activeObject = canvas.getActiveObject();
    if (activeObject) {
        if (activeObject.left + (activeObject.scaleX * activeObject.width) > endX) {
            activeObject.left = endX - (activeObject.width * activeObject.scaleX);
        } else if (activeObject.left < startX) {
            activeObject.left = startX;
        }
        
        if ((activeObject.top + (activeObject.scaleY * activeObject.height)) > endY) {
            activeObject.top = endY - (activeObject.scaleY * activeObject.height);
        }
        else if (activeObject.top < startY) {
            activeObject.top = startY;
        }
        
    }
}

// shm this event calls when any object is dragged on canvas     
canvas.on('object:moving', function (event) {
    var hoverTarget = canvas.findTarget(event.e, false);
    console.log('Hover Target: '+hoverTarget);
    
    canvasDragBoundries();
    canvas.renderAll();
    
    // new shm coords test script
    var obj = event.target;
    // if object is too big ignore
    /* if(obj.currentHeight > obj.canvas.height || obj.currentWidth > obj.canvas.width){
        return;
    } */        
    obj.setCoords();        
    // top-left  corner
    if(obj.getBoundingRect().top < 0 || obj.getBoundingRect().left < 0){
        obj.top = Math.max(obj.top, obj.top-obj.getBoundingRect().top);
        obj.left = Math.max(obj.left, obj.left-obj.getBoundingRect().left);
    }
    // bot-right corner
    if(obj.getBoundingRect().top+obj.getBoundingRect().height  > obj.canvas.height || obj.getBoundingRect().left+obj.getBoundingRect().width  > obj.canvas.width){
        obj.top = Math.min(obj.top, obj.canvas.height-obj.getBoundingRect().height+obj.top-obj.getBoundingRect().top);
        obj.left = Math.min(obj.left, obj.canvas.width-obj.getBoundingRect().width+obj.left-obj.getBoundingRect().left);
    }

});

////////////////////////////////////////////////////

$("#btn_add_to_cart").click(function () {

    var price = $('#total_price').val();
    var form = $('#form_add_to_cart').serialize();

    var jqxhr = $.get("../cart/add", form, function () {
        alert(form);
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
            var view = "{{ $canvas_image_title }}";
            showCanvas(image,view);
            // $("#slide_" + value[2]).trigger("click");
        }
        
        
        
        
///////////// Start UNDO and REDO  ////////////////////////////////
var state = [];
var mods = 0;
canvas.on(
    'object:modified', function (e) {
        updateModifications(true);
        
        // new shm coords test script
        var obj = e.target;
        // if object is too big ignore
        /* if(obj.currentHeight > obj.canvas.height || obj.currentWidth > obj.canvas.width){
            return;
        } */        
        obj.setCoords();        
        // top-left  corner
        if(obj.getBoundingRect().top < 0 || obj.getBoundingRect().left < 0){
            obj.top = Math.max(obj.top, obj.top-obj.getBoundingRect().top);
            obj.left = Math.max(obj.left, obj.left-obj.getBoundingRect().left);
        }
        // bot-right corner
        if(obj.getBoundingRect().top+obj.getBoundingRect().height  > obj.canvas.height || obj.getBoundingRect().left+obj.getBoundingRect().width  > obj.canvas.width){
            obj.top = Math.min(obj.top, obj.canvas.height-obj.getBoundingRect().height+obj.top-obj.getBoundingRect().top);
            obj.left = Math.min(obj.left, obj.canvas.width-obj.getBoundingRect().width+obj.left-obj.getBoundingRect().left);
        }

    },
    'object:added', function (f) {
        updateModifications(true);
        
        // new shm coords test script
        var obj = f.target;
        // if object is too big ignore
        /* if(obj.currentHeight > obj.canvas.height || obj.currentWidth > obj.canvas.width){
            return;
        } */        
        obj.setCoords();        
        // top-left  corner
        if(obj.getBoundingRect().top < 0 || obj.getBoundingRect().left < 0){
            obj.top = Math.max(obj.top, obj.top-obj.getBoundingRect().top);
            obj.left = Math.max(obj.left, obj.left-obj.getBoundingRect().left);
        }
        // bot-right corner
        if(obj.getBoundingRect().top+obj.getBoundingRect().height  > obj.canvas.height || obj.getBoundingRect().left+obj.getBoundingRect().width  > obj.canvas.width){
            obj.top = Math.min(obj.top, obj.canvas.height-obj.getBoundingRect().height+obj.top-obj.getBoundingRect().top);
            obj.left = Math.min(obj.left, obj.canvas.width-obj.getBoundingRect().width+obj.left-obj.getBoundingRect().left);
        }

    });

function updateModifications(savehistory) {
    
    if (savehistory === true) {
        myjson = JSON.stringify(canvas);
        state.push(myjson);
    }
}

undo = function undo() {
    console.log(mods);
    console.log(state.length);


    if ((mods + 1) < state.length) {
        canvas.clear().renderAll();
        canvas.loadFromJSON(state[state.length - 1 - mods - 1], canvas.renderAll.bind(canvas));

        canvas.renderAll();
        //console.log("geladen " + (state.length-1-mods-1));
        //console.log("state " + state.length);
        mods += 1;
        //console.log("mods " + mods);
            }
        }

        redo = function redo() {
            if (mods > 0) {
                canvas.clear().renderAll();
                canvas.loadFromJSON(state[state.length - 1 - mods + 1], canvas.renderAll.bind(canvas));
                canvas.renderAll();
                //console.log("geladen " + (state.length-1-mods+1));
                mods -= 1;
                //console.log("state " + state.length);
                //console.log("mods " + mods);
            }
        }

        clearcan = function clearcan() {
            canvas.clear().renderAll();
//            newleft = 0;
}

        /////////////////End Undo and Redoo ///////////////////////////////

        


        function createMask1(){
            var img01URL = 'https://www.google.com/images/srpr/logo4w.png';
            var img02URL = 'http://fabricjs.com/lib/pug.jpg';

// Note the use of the `originX` and `originY` properties, which we set
// to 'left' and 'top', respectively. This makes the math in the `clipTo`
// functions a little bit more straight-forward.
var clipPoly = new fabric.Polygon([
    { x: 180, y: 10 },
    { x: 300, y: 50 },
    { x: 300, y: 180 },
    { x: 180, y: 220 }
    ], {
        originX: 'left',
        originY: 'top',
        left: 180,
        top: 10,
        width: 200,
        height: 200,
        fill: '#DDD', /* use transparent for no fill */
        strokeWidth: 0,
        selectable: false
    });
// We give these `Rect` objects a name property so the `clipTo` functions can
// find the one by which they want to be clipped.
clipPoly.set({
    clipFor: 'pug'
});
canvas.add(clipPoly);

var clipRect2 = new fabric.Rect({
    originX: 'left',
    originY: 'top',
    left: 10,
    top: 10,
    width: 200,
    height: 200,
    fill: '#DDD', /* use transparent for no fill */
    strokeWidth: 0,
    selectable: false
});
// We give these `Rect` objects a name property so the `clipTo` functions can
// find the one by which they want to be clipped.
clipRect2.set({
    clipFor: 'logo'
});
canvas.add(clipRect2);



var clipByName = function (ctx) {
    this.setCoords();
    var clipObj = findByClipName(this.clipName);
    var scaleXTo1 = (1 / this.scaleX);
    var scaleYTo1 = (1 / this.scaleY);
    ctx.save();
    
    var ctxLeft = -( this.width / 2 ) + clipObj.strokeWidth;
    var ctxTop = -( this.height / 2 ) + clipObj.strokeWidth;
    var ctxWidth = clipObj.width - clipObj.strokeWidth;
    var ctxHeight = clipObj.height - clipObj.strokeWidth;

    ctx.translate( ctxLeft, ctxTop );
    ctx.scale(scaleXTo1, scaleYTo1);
    ctx.rotate(degToRad(this.angle * -1));
    
    ctx.beginPath();
    
    var isPolygon = clipObj instanceof fabric.Polygon;
    // polygon cliping area
    if(isPolygon)
    {
        // prepare points of polygon
        var points = [];
        for(i in clipObj.points)
            points.push({
                x: (clipObj.left + clipObj.width / 2) + clipObj.points[i].x - this.oCoords.tl.x,
                y: (clipObj.top + clipObj.height / 2) + clipObj.points[i].y - this.oCoords.tl.y
            });
        
        ctx.moveTo(points[0].x, points[0].y);
        for(i=1; i<points.length; ++i)
        {
        	ctx.lineTo(points[i].x, points[i].y);
        }
        ctx.lineTo(points[0].x, points[0].y);
    }
    // rectangle cliping area
    else
    {
        ctx.rect(
            clipObj.left - this.oCoords.tl.x,
            clipObj.top - this.oCoords.tl.y,
            clipObj.width,
            clipObj.height
            );
    }
    
    ctx.closePath();
    
    ctx.restore();
}

var pugImg = new Image();
pugImg.onload = function (img) {    
    var pug = new fabric.Image(pugImg, {
        angle: 45,
        width: 500,
        height: 500,
        left: 230,
        top: 50,
        scaleX: 0.3,
        scaleY: 0.3,
        clipName: 'pug',
        clipTo: function(ctx) { 
            return _.bind(clipByName, pug)(ctx) 
        }
    });
    canvas.add(pug);
};


pugImg.src = img02URL;

var logoImg = new Image();
logoImg.onload = function (img) {    
    var logo = new fabric.Image(logoImg, {
        angle: 0,
        width: 550,
        height: 190,
        left: 50,
        top: 50,
        scaleX: 0.25,
        scaleY: 0.25,
        clipName: 'logo',
        clipTo: function(ctx) { 
            return _.bind(clipByName, logo)(ctx) 
        }
    });
    canvas.add(logo);
};
logoImg.src = img01URL;




}

function findByClipName(name) {
    return _(canvas.getObjects()).where({
        clipFor: name
    }).first()
}

// Since the `angle` property of the Image object is stored 
// in degrees, we'll use this to convert it to radians.
function degToRad(degrees) {
    return degrees * (Math.PI / 180);
}

function addPattern(obj){
  fabric.util.loadImage('http://fabricjs.com/assets/pug_small.jpg', function (img) {

    obj.fill = new fabric.Pattern({
        source: img,
        repeat: 'no-repeat'
    }); 
    canvas.renderAll();
});
}


function createMask(){
    
  var text = new fabric.Text("Testing", {
      fontSize: 50,
      fill: "green",
      top: 50,
      left:50
  }); 
  canvas.add(text);
  text.globalCompositeOperation = 'source-atop';
  canvas.renderAll(); 
  
}
canvas.on({
    'object:moving': function(e) {
        e.target.opacity = 0.5;
    },
    'object:modified': function(e) {
        e.target.opacity = 1;
        var connect_LP  = "{{ $connect_LP }}";
        console.log('E Target: '+JSON.stringify(e.target));
        if(e.target.type === 'image'){
            $("#target_type").val(e.target.type);
            $("#item_x").val(e.target.left);
            $("#item_y").val(e.target.top);
//            $("#item_w").val(e.target.currentWidth);
//            $("#item_h").val(e.target.currentHeight);              
            $("#item_src").val(G_logoPath);
            $("#canvas_image").val(G_canvas_image);
        } else if(e.target.type === 'i-text'){
            
            $("#target_type").val(e.target.type);
            $("#text").val(e.target.text);
            $("#text_font").val(e.target.fontFamily);
            $("#text_x").val(e.target.left);
            $("#text_y").val(e.target.top);
            $("#text_point_size").val(e.target.fontSize);
            $("#text_color").val(e.target.fill);
    
        }

        var image_view = G_imageView;
        var source_image = actualThumbnailPath;
        var texture_path = selectedTexture;
        var product_name = selectedProductName;


        if(G_imageView === 'inside factory'){
            G_canvas_left = JSON.stringify(canvas.toDatalessJSON());
            G_pair_texture_inside = texture_path;

        }

        else if(G_imageView === 'outside factory'){
            G_canvas_right = JSON.stringify(canvas.toDatalessJSON());
            G_pair_texture_outside = texture_path;
        }

        else if(G_imageView === 'top factory'){
            G_canvas_top = JSON.stringify(canvas.toDatalessJSON());
            G_pair_texture_top = texture_path;
        }

        canvas.deactivateAll().renderAll();

        document.getElementById('image_data3').value = canvas.toDataURL();
        document.getElementById('source_image').value = source_image;
        document.getElementById('texture_path').value = texture_path;
        document.getElementById('product_caption').value = product_name;
        document.getElementById('sole_color').value = G_sole_color;
        document.getElementById('image_view').value = G_imageView;


        document.getElementById('texture_inside').value = G_pair_texture_inside;
        document.getElementById('texture_outside').value = G_pair_texture_outside;
        document.getElementById('texture_top').value = G_pair_texture_top;

//        document.getElementById('image_view').value = image_view.replace(" ", "_");
        disableObjectButtons();
        canvas.deactivateAll().renderAll();
        /*if(connect_LP === 'true')  
         makeTexturedImageFromCanvas();*/
        //    new shm coords test script
        var obj = e.target;
        // if object is too big ignore
        /* if(obj.currentHeight > obj.canvas.height || obj.currentWidth > obj.canvas.width){
            return;
        } */        
        obj.setCoords();        
        // top-left  corner
        if(obj.getBoundingRect().top < 0 || obj.getBoundingRect().left < 0){
            obj.top = Math.max(obj.top, obj.top-obj.getBoundingRect().top);
            obj.left = Math.max(obj.left, obj.left-obj.getBoundingRect().left);
        }
        // bot-right corner
        if(obj.getBoundingRect().top+obj.getBoundingRect().height  > obj.canvas.height || obj.getBoundingRect().left+obj.getBoundingRect().width  > obj.canvas.width){
            obj.top = Math.min(obj.top, obj.canvas.height-obj.getBoundingRect().height+obj.top-obj.getBoundingRect().top);
            obj.left = Math.min(obj.left, obj.canvas.width-obj.getBoundingRect().width+obj.left-obj.getBoundingRect().left);
        }
    }
});
    
//  shm: this func is used to select factory view on canvas for changes
function showWorkingCanvas(view,image) {
	G_canvas_image = image;
        disableObjectButtons();
        if(view === 'inside factory'){
         
            if(G_canvas_left !== ""){
                canvas.loadFromJSON(G_canvas_left, canvas.renderAll.bind(canvas), function (o, object) {});
            } else showCanvas(image,view);
      
        } 
  else if(view === 'outside factory'){

     if(G_canvas_right !== ""){
        canvas.loadFromJSON(G_canvas_right, canvas.renderAll.bind(canvas), function (o, object) {});
    } else
    showCanvas(image,view);
}
else if(view === 'top factory'){
    if(G_canvas_top !== ""){
       canvas.loadFromJSON(G_canvas_top, canvas.renderAll.bind(canvas), function (o, object) {});
   } else
   showCanvas(image,view);
   
}
canvas.renderAll();
}     

</script>
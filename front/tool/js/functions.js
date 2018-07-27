// var canvas = this.__canvas = new fabric.Canvas('c');


// var clipPath = new fabric.Path("M 10 10 L 200 10 L 200 200 L 10 200", {
//     fill: 'rgba(0,0,0,0)',
// });
//
// var backgroundColor = "rgba(0,0,0, 0.1)";
//
// var opts = {
//     backgroundColor: 'rgb(255,255,215)',
//     controlsAboveOverlay: true,
//     clipTo: function (ctx) {
//         if (typeof backgroundColor !== 'undefined') {
//             ctx.fillStyle = backgroundColor;
//             ctx.image
//
//             ctx.fillRect(0, 0, 900, 950);
//         }
//         clipPath.render(ctx);
//     }
// }
// var canvas = new fabric.Canvas('c', opts);


var startX = 0;
var endX = 580;
var startY = 0;
var endY = 430


$(document).ready(function () {
    showShirtCanvas();
    disableObjectButtons();
    disableTextControl();

    //drawBoard();
});


// ...
// canvas.clipTo = function (ctx) {
//     ctx.rect(20, 20, 550, 500);
// };


// new fabric.Element('canvas', {
//     clipTo: function(ctx) {
//         ctx.arc(0, 0, 60, 80, Math.PI*2, true);
//     }
// });


var canvas = this.__canvas = new fabric.CanvasWithViewport("c");
var canvas_bg = this.__canvas = new fabric.CanvasWithViewport("d");
canvas.isGrabMode = false;
canvas.canvas_bg = false;
var context = canvas.getContext('2d');
// var context_bg = canvas_bg.getContext('2d');


//////////////////////////////////////////////////////////


canvas.counter = 0;
var newleft = 0;
canvas.selection = false;

addrect = function addrect(top, left, width, height, fill) {
    canvas.add(new fabric.Rect({
        top: document.getElementById("fabriccanvas").height,
        name: 'rectangle ' + window.counter,
        left: 0 + newleft,
        width: 100,
        height: 100,
        fill: '#' + (0x1000000 + (Math.random()) * 0xffffff).toString(16).substr(1, 6),
        //fix attributes applied for all rects
        opacity: 0.75,
        lockRotation: true,
        originX: 'left',
        originY: 'bottom',
        cornerSize: 15,
        hasRotatingPoint: false,
        perPixelTargetFind: true,
        minScaleLimit: 1
    }));
    updateModifications(true);
    canvas.counter++;
    newleft += 100;
}
var state = [];
var mods = 0;
canvas.on(
    'object:modified', function () {
        updateModifications(true);
    },
    'object:added', function () {
        updateModifications(true);
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
    newleft = 0;
}
document.getElementById('imgLoader').onchange = function handleImage(e) {
    var reader = new FileReader();
    reader.onload = function (event) {
        console.log('fdsf');
        var imgObj = new Image();
        imgObj.src = event.target.result;
        imgObj.onload = function () {
            // start fabricJS stuff

            var image = new fabric.Image(imgObj);
            image.set({
                left: 250,
                top: 235,

            });
            // image.scale(getRandomNum(0.1, 0.25)).setCoords();


            console.log(image.width);
            console.log(image.height);

            var newSize = scaleSize(250, 400, image.width, image.height);
            // alert('New Width: ' + newSize[0] + ', New Height: ' + newSize[1]);

            image.width = newSize[0];
            image.height = newSize[1];


            //
            // if(image.width >= "300" && image.width <= "600" || image.height >= "400" && image.height <= "600"){
            //
            //     image.scaleX = 0.5;
            //     image.scaleY = 0.5;
            // }
            //
            // else if(image.width > "600" || image.height > "600"){
            //
            //     image.scaleX = 0.3;
            //     image.scaleY = 0.3;
            //
            // }


            // var filter = new fabric.Image.filters.Invert();
            // image.filters.push(filter);
            // image.applyFilters(canvas.renderAll.bind(canvas));

            //
            // var filter = new fabric.Image.filters.Grayscale();
            // image.filters.push(filter);
            // image.applyFilters(canvas.renderAll.bind(canvas));

            // var filter = new fabric.Image.filters.Sepia();
            // image.filters.push(filter);
            // image.applyFilters(canvas.renderAll.bind(canvas));


            // var filter = new fabric.Image.filters.Noise({
            //     noise: 200
            // });
            // image.filters.push(filter);
            // image.applyFilters(canvas.renderAll.bind(canvas));

            canvas.add(image);

            // end fabricJS stuff
        }

    }
    reader.readAsDataURL(e.target.files[0]);
}


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


// canvas.observe("object:moving", function(e){
//     //alert("oval moving");
//     var obj = e.target;
//     // if object is too big ignore
//
//
//     var halfw = '300';//obj.currentWidth/2;
//     var halfh = '300';//obj.currentHeight/2;
//     var bounds = {tl: {x: halfw, y:halfh},
//        // br: {x: obj.canvas.width , y: obj.canvas.height }
//         br: {x: '100' , y: '100' }
//     };
//
//     // top-left  corner
//
//
//
//     // alert("text");
//     if(obj.top < bounds.tl.y || obj.left < bounds.tl.x){
//         obj.top = Math.max(obj.top, '50'  );
//         obj.left = Math.max(obj.left , '250' )
//     }
//
//
//     // bot-right corner
//     if(obj.top > bounds.br.y || obj.left > bounds.br.x ){
//         obj.top = Math.min(obj.top, '360'  );
//         obj.left = Math.min(obj.left, '470' )
//     }
//
// });
// end canvas moving limit


// function saveImage() {
//     var dataURL = canvas.toDataURL('image/png');
//     button.href = dataURL;
//
// }

function saveImg() {
    var img = canvas.toDataURL("image/png");
    if (!fabric.Canvas.supports('toDataURL')) {
        alert('This browser doesn\'t provide means to serialize canvas to an image');
    }
    else {
        window.open(canvas.toDataURL('png'));
    }
}

// var c = document.getElementById("c");
// var ctx = c.getContext("2d");
// ctx.fillStyle = "red";
// ctx.fillRect(10, 10, 50, 50);


function RemoveSelectedItems() {

    if (canvas.getActiveGroup()) {
        canvas.getActiveGroup().forEachObject(function (o) {
            canvas.remove(o)
        });
        canvas.discardActiveGroup().renderAll();
    } else {
        canvas.remove(canvas.getActiveObject());
    }

}

function RemoveLastItem() {

    var canvas_objects = canvas._objects;
    if (canvas_objects.length !== 0) {
        console.log(canvas_objects.length);
        var last = canvas_objects[canvas_objects.length - 1]; //Get last object
        canvas.remove(last);
        canvas.renderAll();
    }
}

function ZoomIn() {

    if (canvas.viewport.zoom < 1.6)
        canvas.setZoom(canvas.viewport.zoom * 1.1);

    // if(canvas_bg.viewport.zoom < 1.6)
    //     canvas_bg.setZoom(canvas_bg.viewport.zoom * 1.1);


    //canvas.height = canvas.height + 20;

}

function ResetZoom() {
    canvas.setZoom(1);
    // canvas_bg.setZoom(1);
}

function ZoomOut() {

    if (canvas.viewport.zoom > 0.64)
        canvas.setZoom(canvas.viewport.zoom / 1.1);

    // if(canvas_bg.viewport.zoom > 0.64)
    //     canvas_bg.setZoom(canvas_bg.viewport.zoom / 1.1);

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


    if (custom_text != "") {
        var custom_text_obj = new fabric.IText(custom_text, {
            // var custom_text_obj = new fabric.Text(custom_text, {
            fontSize: document.getElementById("size_selector").value,
            fontFamily: document.getElementById("font_selector").value,
            // originX: 'center',
            // originY: 'center',
            name: 'rectangle ' + window.counter,
            fill: text_color,
            left: 340,
            top: 300,
            // stroke:stroke_color,
            // strokeWidth:1,
            applicableFonts: ["Arial", "Times New Roman", "Currier New", "Tahoma"]
        });

        //document.getElementById("my_text").value = "";
        document.getElementById("my_text").value = "";


        //custom_text_obj.setStrokeWidth('1');
        //custom_text_obj.setStroke(stroke_color);
        canvas.add(custom_text_obj);

    }


    updateModifications(true);
    canvas.counter++;
    newleft += 100;
}

function addImage(img) {
    fabric.Image.fromURL('images/' + img + '.png', function (img) {
        img.scale(0.2).set({
            left: 300,
            top: 250,
            angle: 0,
            originX: "center",
            originY: "center"

        });
        canvas.add(img).setActiveObject(img);
    });
}

function addAnimalImage(img) {
    fabric.Image.fromURL('images/animal/' + img + '.png', function (img) {
        img.scale(0.2).set({
            left: 300,
            top: 250,
            angle: 0,
            originX: "center",
            originY: "center"

        });
        canvas.add(img).setActiveObject(img);
    });
}

function addLogoImage(img) {
    fabric.Image.fromURL('images/logo/' + img + '.png', function (img) {
        img.scale(0.4).set({
            left: 300,
            top: 250,
            angle: 0,
            originX: "center",
            originY: "center"

        });
        canvas.add(img).setActiveObject(img);
    });
}

function addClipArtImage(img) {

    var colorSet = document.getElementById("svg_color_code").value;


    fabric.loadSVGFromURL('images/clipart/' + img + '.svg', function (objects, options) {
        var shape = fabric.util.groupSVGElements(objects, options);
        shape.set({
            left: 300,
            top: 250,
            stroke: '#ef2eee',
            strokeWidth: 1,

        });
        if (shape.isSameColor && shape.isSameColor() || !shape.paths) {
            shape.setFill(colorSet);
            // shape.setStrokeStyles('#eeeeee')
        }
        else if (shape.paths) {
            for (var i = 0; i < shape.paths.length; i++) {
                shape.paths[i].setFill(colorSet);
                // shape[i].set({
                //     strokeWidth: 1,
                //     stroke: 'rgb(0,0,0)'
                // });
            }
        }
        canvas.add(shape);
        canvas.renderAll();
    });


}

function addLogoSvg(img) {

    var colorSet = document.getElementById("svg_color_code").value;


    fabric.loadSVGFromURL('images/clipart/' + img + '.svg', function (objects, options) {
        var shape = fabric.util.groupSVGElements(objects, options);
        shape.set({
            left: 300,
            top: 250,
            // stroke:'#ef2eee',
            // strokeWidth: 2,

        });
        if (shape.isSameColor && shape.isSameColor() || !shape.paths) {
            // shape.setFill(colorSet);
            // shape.setStrokeStyles('#eeeeee')
        }
        else if (shape.paths) {
            for (var i = 0; i < shape.paths.length; i++) {
                //shape.paths[i].setFill(colorSet);
                // shape[i].set({
                //     strokeWidth: 1,
                //     stroke: 'rgb(0,0,0)'
                // });
            }
        }
        canvas.add(shape);
        canvas.renderAll();
    });


}

function addShape(type) {

    var shape_color = document.getElementById("shape_color_code").value;
    var rectangle = new fabric.Rect({top: 100, left: 100, width: 150, height: 50, fill: shape_color});
    var circle = new fabric.Circle({top: 140, left: 230, radius: 50, fill: shape_color});
    var triangle = new fabric.Triangle({top: 300, left: 210, width: 100, height: 100, fill: shape_color});
    var polygonPoints = regularPolygonPoints(6, 50);

    var myPoly = new fabric.Polygon(polygonPoints, {
        //stroke: 'red',
        left: 230,
        top: 200,
        fill: shape_color,
        // strokeWidth: 2,
        strokeLineJoin: 'bevil'
    }, false);
    // canvas.add(myPoly);

    var points = starPolygonPoints(5, 50, 25);
    var myStar = new fabric.Polygon(points, {
        // stroke: 'red',
        left: 230,
        top: 200,
        fill: shape_color,
        // strokeWidth: 2,
        strokeLineJoin: 'bevil'
    }, false);


    var texture = new fabric.Rect({top: 100, left: 100, width: 350, height: 200, fill: shape_color});


    fabric.util.loadImage('images/texture_1.png', function (img) {
        texture.setPatternFill({
            source: img,
            repeat: 'repeat'
        });
        canvas.renderAll();
    });

    switch (type) {
        case "rectangle":
            canvas.add(rectangle);
            break;
        case "circle":
            canvas.add(circle);
            break;
        case "triangle":
            canvas.add(triangle);
            break;
        case "star":
            canvas.add(myStar);
            break;
        case "polygon":
            canvas.add(myPoly);
            break;
        case "texture":
            canvas.add(texture);
            break;
        default:
    }
    canvas.renderAll();
}

function starPolygonPoints(spikeCount, outerRadius, innerRadius) {
    var rot = Math.PI / 2 * 3;
    var cx = outerRadius;
    var cy = outerRadius;
    var sweep = Math.PI / spikeCount;
    var points = [];
    var angle = 0;

    for (var i = 0; i < spikeCount; i++) {
        var x = cx + Math.cos(angle) * outerRadius;
        var y = cy + Math.sin(angle) * outerRadius;
        points.push({x: x, y: y});
        angle += sweep;

        x = cx + Math.cos(angle) * innerRadius;
        y = cy + Math.sin(angle) * innerRadius;
        points.push({x: x, y: y});
        angle += sweep
    }
    return (points);
}

function regularPolygonPoints(sideCount, radius) {
    var sweep = Math.PI * 2 / sideCount;
    var cx = radius;
    var cy = radius;
    var points = [];
    for (var i = 0; i < sideCount; i++) {
        var x = cx + radius * Math.cos(i * sweep);
        var y = cy + radius * Math.sin(i * sweep);
        points.push({x: x, y: y});
    }
    return (points);
}


function showIphoneCanvas() {

    canvas.setZoom(1);
    canvas.clear();
    fabric.Object.prototype.transparentCorners = true;
    // canvas.setBackgroundImage('shirt.jpeg', canvas.renderAll.bind(canvas));
    // load sun and center it
    fabric.Image.fromURL('images/iphone.png', function (bgImg) {

        // bgImg.scaleX = 1;
        // bgImg.scaleY = 0.6;
        canvas.add(bgImg);
        canvas.item(0).selectable = false;
        // canvas.s = 0.5;
        bgImg.center();
    });


    canvas.selectionColor = 'rgba(0,255,0,0.1)';
    canvas.selectionBorderColor = 'blue';
    canvas.selectionLineWidth = 0.2;
    canvas.selection = false;


}

function showMugCanvas() {

    canvas.setZoom(1);
    canvas.clear();
    fabric.Object.prototype.transparentCorners = true;
    // canvas.setBackgroundImage('shirt.jpeg', canvas.renderAll.bind(canvas));
    // load sun and center it
    fabric.Image.fromURL('images/mug.jpg', function (bgImg) {

        // bgImg.scaleX = 0.8;
        // bgImg.scaleY = 0.8;
        canvas.add(bgImg);
        canvas.item(0).selectable = false;
        // canvas.s = 0.5;
        bgImg.center();
    });


    canvas.selectionColor = 'rgba(0,255,0,0.1)';
    canvas.selectionBorderColor = 'blue';
    canvas.selectionLineWidth = 0.2;
    canvas.selection = false;


}

function showShirtCanvas() {

    canvas.setZoom(1);
    canvas.clear();

    // canvas_bg.setZoom(1);
    // canvas_bg.clear();

    fabric.Object.prototype.transparentCorners = true;

    //load sun and center it


    fabric.Image.fromURL('images/tshirt.png', function (bgImg) {
        bgImg.scaleX = 1;
        bgImg.scaleY = 1;
        canvas.add(bgImg);
        canvas.item(0).selectable = false;
        canvas.item(0).name = 'amair';
        bgImg.center();
    });

    canvas.selectionColor = 'rgba(0,255,0,0.1)';
    canvas.selectionBorderColor = 'blue';
    canvas.selectionLineWidth = 0.2;

    canvas.selection = false; // disable group selection
    // canvas1.setBackgroundImage('shirt1.jpg', canvas.renderAll.bind(canvas1));


}

function showBuisnessCardCanvas() {

    canvas.setZoom(1);
    canvas.clear();
    fabric.Object.prototype.transparentCorners = true;

    //load sun and center it
    var shape_color = "35a7e1";//document.getElementById("shape_color_code").value;
    var texture = new fabric.Rect({top: 170, left: 100, width: 460, height: 270, padding: 10, fill: shape_color});
    var border = new fabric.Rect({
        top: 178,
        left: 108,
        width: 440,
        height: 250,
        stroke: '#808080',
        strokeWidth: 2,
        fill: "rgba(0,0,0,0)"
    });


    var shadow = {
        color: 'rgba(0,0,0,0.6)',
        blur: 10,
        offsetX: 7,
        offsetY: 7,
        opacity: 0.6,
        fillShadow: true,
        strokeShadow: true
    }
    fabric.util.loadImage('images/texture_1.png', function (img) {
        texture.setPatternFill({
            source: img,
            repeat: 'repeat'
        });

        texture.setShadow(shadow);
        canvas.add(texture);
        canvas.add(border);
        canvas.item(0).selectable = false;
        canvas.item(1).selectable = false;
        canvas.renderAll();
    });

    canvas.selectionColor = 'rgba(0,255,0,0.1)';
    canvas.selectionBorderColor = 'blue';
    canvas.selectionLineWidth = 0.2;

    canvas.selection = false; // disable group selection
    // canvas1.setBackgroundImage('shirt1.jpg', canvas.renderAll.bind(canvas1));


}

function makeDragBoundries() {

    canvas.observe("object:moving", function (e) {
        //alert("oval moving");
        var obj = e.target;
        // if object is too big ignore

        var halfw = obj.currentWidth / 2;
        var halfh = obj.currentHeight / 2;
        var bounds = {
            tl: {x: halfw, y: halfh},
            br: {x: obj.canvas.width, y: obj.canvas.height}
        };

        // alert("text");
        if (obj.top < bounds.tl.y || obj.left < bounds.tl.x) {
            obj.top = Math.max(obj.top, '190');
            obj.left = Math.max(obj.left, '10')
        }

        // bot-right corner
        if (obj.top > bounds.br.y || obj.left > bounds.br.x) {
            obj.top = Math.min(obj.top, '320');
            obj.left = Math.min(obj.left, '150')
        }
    });

}

function sendBack() {
    // draw_grid('251');
    var activeObject = canvas.getActiveObject();
    if (canvas.getObjects().indexOf(activeObject) != 1) {
        if (activeObject)
            canvas.sendBackwards(activeObject);
    }
}

function sendFront() {

    var activeObject = canvas.getActiveObject();
    if (activeObject)
        canvas.bringForward(activeObject);

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
}

function changeOpacity(value) {

    var activeObject = canvas.getActiveObject();

    console.log(value);

    if (activeObject) {
        activeObject.set({
            opacity: value
        });
    }

    canvas.renderAll();

}

/////////////////////////////////////////////////////////////


function addCurveText() {

    // Example = new CurvedText( canvas, {angle:50} );
    // Example.center();
    //
    //
    // $('.radius, .spacing, .align, .fontSize').change(function(){
    //     Example.set( $(this).attr('class'), $(this).val() ) ;
    // });
    // $('.reverse').change(function(){
    //     Example.set( 'reverse', ( $(this).val() == 'true' ) ) ;
    // });
    // $('.text').keyup(function(){
    //     Example.setText( $(this).val() ) ;
    // });


    // canvas = new fabric.Canvas('c');
    //  canvas.on('selection:cleared', onDeSelected);
    //  canvas.on('object:selected', onSelected);
    //  canvas.on('selection:created', onSelected);
//     var CurvedText = new fabric.CurvedText('CurvedText',{
// //        width: 100,
// //        height: 50,
//         left: 100,
//         top: 100,
//         textAlign: 'center',
//         fill: '#0000FF',
//         radius: 50,
//         fontSize: 20,
//         spacing: 20
// //        fontFamily: 'Arial'
//     });
    // canvas.add(CurvedText).renderAll();
    // canvas.setActiveObject(canvas.item(canvas.getObjects().length-1));
    // $('#text').keyup(function(){
    //     var obj = canvas.getActiveObject();
    //     if(obj){
    //         obj.setText(this.value);
    //         canvas.renderAll();
    //     }
    // });
    // $('#reverse').click(function(){
    //     var obj = canvas.getActiveObject();
    //     if(obj){
    //         obj.set('reverse',$(this).is(':checked'));
    //         canvas.renderAll();
    //     }
    // });
    // $('#radius, #spacing, #fill').change(function(){
    //     var obj = canvas.getActiveObject();
    //     if(obj){
    //         obj.set($(this).attr('id'),$(this).val());
    //     }
    //     canvas.renderAll();
    // });
    // $('#radius, #spacing, #effect').change(function(){
    //     var obj = canvas.getActiveObject();
    //     if(obj){
    //         obj.set($(this).attr('id'),$(this).val());
    //     }
    //     canvas.renderAll();
    // });
    // $('#fill').change(function(){
    //     var obj = canvas.getActiveObject();
    //     if(obj){
    //         obj.setFill($(this).val());
    //     }
    //     canvas.renderAll();
    // });
    // $('#convert').click(function(){
    //     var props = {};
    //     var obj = canvas.getActiveObject();
    //     if(obj){
    //         if(/curvedText/.test(obj.type)) {
    //             default_text = obj.getText();
    //             props = obj.toObject();
    //             delete props['type'];
    //             var textSample = new fabric.Text(default_text, props);
    //         }else if(/text/.test(obj.type)) {
    //             default_text = obj.getText();
    //             props = obj.toObject();
    //             delete props['type'];
    //             props['textAlign'] = 'center';
    //             props['radius'] = 50;
    //             props['spacing'] = 20;
    //             var textSample = new fabric.CurvedText(default_text, props);
    //         }
    //         canvas.remove(obj);
    //         canvas.add(textSample).renderAll();
    //         canvas.setActiveObject(canvas.item(canvas.getObjects().length-1));
    //     }
    // });
}

function angle(value) {


    var activeObject = canvas.getActiveObject();

    if (activeObject) {
        console.log(value);
        activeObject.setAngle(value).setCoords();


        // activeObject.set({
        //     angle: value
        // });
    }
    //var curAngle = activeObject.getAngle();
    //activeObject.setAngle(value);


    // activeObject.setAngle(parseInt(value, 10)).setCoords();
    canvas.renderAll();

}

function aa() {
    //var canvas = this.__canvas = new fabric.Canvas('c');
    fabric.Object.prototype.transparentCorners = false;

    var $ = function (id) {
        return document.getElementById(id)
    };

    var rect = new fabric.Rect({
        width: 100,
        height: 100,
        top: 100,
        left: 100,
        fill: 'rgba(255,0,0,0.5)'
    });

    canvas.add(rect);

    var angleControl = $('angle-control');
    angleControl.onchange = function () {
        rect.setAngle(parseInt(this.value, 10)).setCoords();
        canvas.renderAll();
    };

    var scaleControl = $('scale-control');
    scaleControl.onchange = function () {
        rect.scale(parseFloat(this.value)).setCoords();
        canvas.renderAll();
    };

    var topControl = $('top-control');
    topControl.onchange = function () {
        rect.setTop(parseInt(this.value, 10)).setCoords();
        canvas.renderAll();
    };

    var leftControl = $('left-control');
    leftControl.onchange = function () {
        rect.setLeft(parseInt(this.value, 10)).setCoords();
        canvas.renderAll();
    };

    function updateControls() {
        scaleControl.value = rect.scaleX();
        angleControl.value = rect.getAngle();
        leftControl.value = rect.getLeft();
        topControl.value = rect.getTop();
    }

    canvas.on({
        'object:moving': updateControls,
        'object:scaling': updateControls,
        'object:resizing': updateControls,
        'object:rotating': updateControls
    });
};


// canvas.on({
//     'mouse:down': function(e) {
//         if (e.target) {
//             e.target.opacity = 0.5;
//             canvas.renderAll();
//         }
//     },
//     'mouse:up': function(e) {
//         if (e.target) {
//             e.target.opacity = 1;
//             canvas.renderAll();
//         }
//     },
//     'object:moved': function(e) {
//         e.target.opacity = 0.5;
//     },
//     'object:modified': function(e) {
//         e.target.opacity = 1;
//     }
// });


// function onSelected(){
//     var obj = canvas.getActiveObject();
//     $('#text').val(obj.getText());
//     $('#reverse').prop('checked', obj.get('reverse'));
//     $('#radius').val(obj.get('radius'));
//     $('#spacing').val(obj.get('spacing'));
//     $('#fill').val(obj.getFill());
//     $('#effect').val(obj.getEffect());
// }
// function onDeSelected(){
//     $('#text').val('');
//     $('#reverse').prop('checked', false);
//     $('#radius').val(50);
//     $('#spacing').val(20);
//     $('#fill').val('#0000FF');
//     $('#effect').val('curved');
// }


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

    document.getElementById("sendBack").disabled = true;
    document.getElementById("sendFront").disabled = true;
    document.getElementById("flipHorizontal").disabled = true;
    document.getElementById("flipVertical").disabled = true;
    document.getElementById("duplicate").disabled = true;
    document.getElementById("delete").disabled = true;


}

function activeObjectButtons() {

    document.getElementById("sendBack").disabled = false;
    document.getElementById("sendFront").disabled = false;
    document.getElementById("flipHorizontal").disabled = false;
    document.getElementById("flipVertical").disabled = false;
    document.getElementById("duplicate").disabled = false;
    document.getElementById("delete").disabled = false;


}

canvas.on('mouse:down', function (options) {
    console.log('an object was clicked! ', options.target.type);

    // var activeObject = canvas.getActiveObject();
    // activeObject.custo({
    //     settings: {
    //         borderColor: 'black',
    //         cornerSize: 25,
    //         cornerShape: 'rect',
    //         cornerBackgroundColor: 'black',
    //         cornerPadding: 10
    //     },
    //     tl: {
    //         icon: 'icons/rotate.svg'
    //     },
    //     tr: {
    //         icon: 'icons/resize.svg'
    //     },
    //     bl: {
    //         icon: 'icons/remove.svg'
    //     },
    //     br: {
    //         icon: 'icons/up.svg'
    //     },
    //     mb: {
    //         icon: 'icons/down.svg'
    //     }
    // });


    //
    // activeObject.set({
    //     borderColor: 'gray',
    //     cornerColor: 'dark gray',
    //     cornerSize: 9,
    //     transparentCorners: false
    // });

    if (typeof options.target === "undefined") {
        disableObjectButtons();
    } else {
        activeObjectButtons();
        removeActiveClass();
        document.getElementById('opacity_range').value = options.target.opacity;
        console.log(options.target.fontWeight);


        if (options.target.fontStyle == "italic")
            $('#btn_italic').addClass("active");

        if (options.target.fontWeight == "bold")
            $('#btn_bold').addClass("active");

        // if(options.target.font != "")
        //     $('#btn_bold').addClass("active");
        //
        // if(options.target.fontStyle != "")
        //     $('#btn_bold').addClass("active");


        if (options.target.type == 'i-text') {
            normalTextControl();
        } else {
            disableTextControl();
        }
        //     document.getElementById('angle-control').value = options.target.angle;
    }

});

function clickListener(el) {
    var button = $(el).attr('id');
    var activeObject = canvas.getActiveObject();
    var text_color = document.getElementById("text_color_code").value;
    var svg_color = document.getElementById("svg_color_code").value;
    var text_bg_color = document.getElementById("text_bg_color_code").value;
    var font_size = document.getElementById("size_selector").value;
    var font_family = document.getElementById("font_selector").value;

    var stroke_color = document.getElementById("stroke_color_code").value;
    var stroke_size = document.getElementById("stroke_size_selector").value;

    var object = document.getElementById($(el).attr('id'));

    console.log(button);

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
                activeObject.setBackgroundColor(text_bg_color);
                break;
            case "text_color_code":
                activeObject.setColor(text_color);
                break;
            case "font_selector":
                console.log(font_family)
                activeObject.set("fontFamily", font_family);
                break;

            case "size_selector":
                activeObject.set("fontSize", font_size);
                break;

            case "svg_color_code":
                activeObject.paths.forEach(function (path) {
                    path.fill = svg_color
                });
                break;

            case "btn_stroke_toggle":
                activeObject.set("strokeWidth", stroke_size);
                activeObject.set("stroke", stroke_color);
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
                break;

        }
    }

    canvas.renderAll();
}


function setImageColor() {

    var svg_color = document.getElementById("svg_color_code").value;
    var activeObject = canvas.getActiveObject();
    // console.log( activeObject.paths);
    // console.log( activeObject.path);
    // console.log( activeObject.fill);


    activeObject.setFill(svg_color);
    //activeObject.setFill(svg_color);

    // for (var i = 0; i < activeObject.path.length; i++) {
    //     // activeObject.path[i].set("fill", svg_color);
    //     activeObject.path[i].setColor(svg_color);
    // }

    //     color = $(this).val();
    //
    // console.log(color) // test
    // activeObject.paths.forEach(function(path) {path.fill = svg_color});
    canvas.renderAll();
}

function setStrokeColor() {

    var stroke_color = document.getElementById("stroke_color_code").value;
    var activeObject = canvas.getActiveObject();
    activeObject.setStroke(stroke_color);
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

    document.getElementById("font_selector").disabled = true;
    document.getElementById("text_color_code").disabled = true;
    document.getElementById("size_selector").disabled = true;
    // document.getElementById("btn_addtext").disabled = true;
    document.getElementById("btn_stroke_toggle").disabled = true;
    document.getElementById("stroke_color_code").disabled = true;
    document.getElementById("stroke_size_selector").disabled = true;
    document.getElementById("btn_align_left").disabled = true;
    document.getElementById("btn_align_center").disabled = true;
    document.getElementById("btn_align_right").disabled = true;
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
    document.getElementById("btn_align_left").disabled = false;
    document.getElementById("btn_align_center").disabled = false;
    document.getElementById("btn_align_right").disabled = false;
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
    document.getElementById("btn_align_left").classList.remove("active");
    document.getElementById("btn_align_center").classList.remove("active");
    document.getElementById("btn_align_right").classList.remove("active");
    // document.getElementById("text_bg_toggle").classList.remove("active");
    // document.getElementById("text_bg_color_code").disabled = false;

}

function fbs_click(TheImg) {
    u = TheImg.src;
    // t=document.title;
    t = TheImg.getAttribute('alt');
    window.open('http://www.facebook.com/sharer.php?u=' + encodeURIComponent(u) + '&t=' + encodeURIComponent(t), 'sharer', 'toolbar=0,status=0,width=626,height=436');
    return false;
}

function shirtViews(view) {

    if (view == 'front') {

        document.getElementById("btn_shirt_front").classList.add("active");
        document.getElementById("btn_shirt_back").classList.remove("active");

    } else {

        document.getElementById("btn_shirt_back").classList.add("active");
        document.getElementById("btn_shirt_front").classList.remove("active");
    }

}


function drawBoard() {
    var bw = 400;
    var bh = 400;
    var p = 10;
    for (var x = 0; x <= bw; x += 40) {
        context.moveTo(0.5 + x + p, p);
        context.lineTo(0.5 + x + p, bh + p);
    }


    for (var x = 0; x <= bh; x += 40) {
        context.moveTo(p, 0.5 + x + p);
        context.lineTo(bw + p, 0.5 + x + p);
    }

    context.strokeStyle = "black";
    context.stroke();
}

function draw_grid(grid_size) {


    var grid = 50;

// create grid

    for (var i = 0; i < (600 / grid); i++) {
        canvas.add(new fabric.Line([i * grid, 0, i * grid, 600], {stroke: '#ccc', selectable: false}));
        canvas.add(new fabric.Line([0, i * grid, 600, i * grid], {stroke: '#ccc', selectable: false}))
    }

}

// canvas moving limit

// canvas.observe("object:moving", function(e){
//     //alert("oval moving");
//     var obj = e.target;
//     // if object is too big ignore
//
//
//     var halfw = obj.currentWidth/2;
//     var halfh = obj.currentHeight/2;
//     var bounds = {tl: {x: halfw, y:halfh},
//         br: {x: obj.canvas.width , y: obj.canvas.height }
//     };
//
//     // top-left  corner
//
//
//
//     // alert("text");
//     if(obj.top < bounds.tl.y || obj.left < bounds.tl.x){
//
//         // 665 570
//         obj.top = Math.max(obj.top, '60'  );
//         obj.left = Math.max(obj.left , '40' )
//         // obj.top = Math.max(obj.top, '10'  );
//         // obj.left = Math.max(obj.left , '50' )
//     }
//
//
//     // bot-right corner
//     if(obj.top > bounds.br.y || obj.left > bounds.br.x ){
//         obj.top = Math.min(obj.top, '360'  );
//         obj.left = Math.min(obj.left, '470' )
//     }
//
// });
// end canvas moving limit


function saveShirtDesign() {

    // console.log(canvas.item(0));
    // canvas.item(0).src = 'aam/images/tshirt.png';
    console.log(JSON.stringify(canvas.toDatalessJSON()));


    // console.log(JSON.stringify(canvas));
    // canvas.toJSON([ 'selectable', '_controlsVisibility', 'code']);
    // console.log(canvas.toSVG());
    // console.log(JSON.stringify(canvas.toDatalessJSON()));
}

function loadFromJson() {

    // var blob = new Blob(["Hello, world!"], {type: "text/plain;charset=utf-8"});
    // saveAs(blob, "hello world.txt");

    var json = '{"objects":[{"type":"image","originX":"left","originY":"top","left":0,"top":-25,"width":665,"height":620,"fill":"rgb(0,0,0)","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","src":"http://localhost/shirt_customization/images/tshirt.png","filters":[],"crossOrigin":""},{"type":"path-group","originX":"left","originY":"top","left":282,"top":137.77,"width":396,"height":383,"fill":"","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":0.27,"scaleY":0.27,"angle":0,"flipX":false,"flipY":false,"opacity":0.58,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","paths":[{"type":"path","originX":"left","originY":"top","left":198,"top":191.5,"width":396,"height":383,"fill":"#231F20","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","path":[["M",84.92,143.32],["c",-8.7,15.58,-15.27,30.07,-19.46,47.77],["l",-17.1,-31.26],["l",-17.1,17.69],["c",8.26,8.06,16.51,16.12,24.77,24.18],["L",11.8,179.89],["L",0,208.19],["c",18.28,2.95,36.56,5.9,54.85,8.85],["c",-10.22,2.55,-20.44,5.11,-30.67,7.67],["c",2.16,6.09,4.32,12.19,6.49,18.28],["c",8.06,-5.11,16.12,-10.22,24.18,-15.33],["c",-1.58,13,-2.84,23.1,-0.59,35.97],["c",4.14,23.7,8.93,34.94,22.41,55.44],["c",19.43,24.29,39.54,36.65,67.82,46.59],["c",39.93,14.04,74.3,20.25,115.59,15.92],["c",38.02,-3.98,78.31,-18.63,103.21,-50.13],["c",30.06,-38.03,36.16,-75.66,30.08,-122.08],["c",-4.32,-32.96,-19.46,-59.84,-40.69,-84.92],["c",-17.89,-21.14,-38.49,-40.46,-64.87,-50.72],["c",-10.21,-24.08,-28.26,-44.49,-49.54,-59.56],["C",224.08,5.66,217.49,-0.3,201.1,0.01],["c",-21.29,0.4,-33.14,20.09,-20.12,37.46],["c",-9.44,-1.11,-18.25,-2.41,-27.73,-1.77],["c",-11.75,0.8,-44.73,6.29,-36.12,26.98],["c",5.81,13.97,21.3,13.44,33.76,14.36],["C",125.34,92.54,99.56,117.13,84.92,143.32],["L",84.92,143.32],["z"],["M",198.75,75.5],["c",-12.61,-0.96,-54.37,2.31,-67.68,-10.41],["c",-7.08,-6.77,-4.75,-13.4,2.4,-17.85],["c",11.19,-6.97,23.31,-6.24,36.7,-5.99],["c",4.68,0.08,6.43,0.77,10.65,2.89],["c",26.13,13.18,43.66,22.48,73.96,29.01],["c",-7.86,-3.34,-15.73,-6.68,-23.59,-10.03],["c",-12.72,-6.12,-24.81,-11.26,-35.39,-20.64],["c",-9.68,-8.59,-18.93,-19.84,-6.49,-28.31],["c",27.14,-18.46,59.53,12.85,78.44,35.97],["c",8.69,10.63,13.79,22.9,19.46,35.38],["c",31.75,14.82,56.58,39.71,76.67,68.41],["c",12.97,22.45,21.02,37.14,23,63.1],["c",3.38,44.28,-3.01,78.79,-33.03,110.28],["c",-27.38,28.73,-69.2,43.24,-109.69,44.82],["c",-37.46,1.46,-66.79,-7.83,-102.03,-20.64],["c",-34.31,-15.1,-61.26,-30.98,-74.9,-67.82],["c",-13.63,-36.82,-4.01,-75.33,14.15,-110.87],["c",12.34,-24.15,22.54,-44.23,41.87,-63.69],["C",144.74,87.49,169.62,78.41,198.75,75.5],["z"]],"pathOffset":{"x":0,"y":0}},{"type":"path","originX":"left","originY":"top","left":198,"top":191.5,"width":396,"height":383,"fill":"#ED1651","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","path":[["M",75.14,299.86],["c",14.92,25.56,38.62,39,67.34,51.63],["c",35.23,12.81,64.57,22.1,102.03,20.64],["c",38.35,-1.49,77.96,-14.65,105.3,-40.45],["c",1.48,-1.4,2.99,-2.9,4.39,-4.38],["c",30.01,-31.5,36.41,-66,33.03,-110.28],["c",-1.98,-25.96,-10.03,-40.65,-23,-63.1],["c",-20.09,-28.7,-44.92,-53.6,-76.67,-68.41],["c",-5.67,-12.48,-10.77,-24.76,-19.46,-35.38],["c",-18.91,-23.12,-51.29,-54.44,-78.44,-35.97],["c",-12.44,8.47,-3.19,19.72,6.49,28.31],["c",10.58,9.38,22.66,14.52,35.38,20.64],["l",23.59,10.03],["c",-30.3,-6.53,-47.83,-15.83,-73.96,-29.01],["c",-4.22,-2.13,-5.97,-2.81,-10.65,-2.89],["c",-13.39,-0.25,-25.51,-0.98,-36.7,5.99],["c",-7.15,4.45,-9.49,11.08,-2.4,17.85],["c",13.31,12.72,55.07,9.45,67.68,10.41],["c",-29.12,2.91,-54.01,11.99,-75.49,33.62],["c",-19.33,19.46,-29.53,39.54,-41.87,63.69],["c",-18.16,35.54,-27.78,74.05,-14.15,110.87],["C",69.72,289.48,72.35,295.01,75.14,299.86],["z"]],"pathOffset":{"x":0,"y":0}},{"type":"path","originX":"left","originY":"top","left":198,"top":191.5,"width":396,"height":383,"fill":"#E2C4A8","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","path":[["M",349.8,331.69],["C",328.46,289.68,266.09,255,198.98,255],["c",-52.66,0,-95.94,16.59,-123.84,44.86],["c",14.92,25.56,38.62,39,67.34,51.63],["c",35.23,12.81,64.57,22.1,102.03,20.64],["C",282.85,370.64,322.46,357.48,349.8,331.69],["z"]],"pathOffset":{"x":0,"y":0}},{"type":"path","originX":"left","originY":"top","left":198,"top":191.5,"width":396,"height":383,"fill":"#231F20","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","path":[["M",257.01,288.48],["c",11.7,7.92,25.34,15.81,37.13,18.02],["c",6.82,1.27,14.76,-0.03,21.66,-0.5],["c",4.4,-0.29,8.81,-0.35,13.18,0.33],["l",9.66,1.5],["l",-70.18,48.24],["l",-2.28,-2.57],["c",-8.72,-9.82,-17.07,-20.23,-24.05,-31.37],["c",-8.14,-12.99,-15.85,-29.36,-14.87,-45.05],["c",0.45,-7.23,3.5,-11.03,7.73,-16.51],["c",11.95,-15.49,33.13,-29.42,52.21,-33.61],["c",16.25,-3.57,35.4,13.66,46.76,23.62],["c",12.52,10.98,26.85,26.05,29.88,43],["l",0.87,4.87],["l",-4.94,-0.31],["c",-8.57,-0.54,-17.61,-2.88,-25.95,-4.95],["c",-7.9,-1.96,-16.58,-4.3,-24.69,-4.94],["c",-10.95,-0.86,-21.58,-0.3,-32.52,0.14],["C",269.98,288.66,263.5,288.77,257.01,288.48],["z"]],"pathOffset":{"x":0,"y":0}},{"type":"path","originX":"left","originY":"top","left":198,"top":191.5,"width":396,"height":383,"fill":"#F4B32E","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","path":[["M",242,282.56],["l",2.09,0.77],["c",23.71,3.59,41.62,-0.83,65.36,1.04],["c",14.9,1.17,35.58,8.94,50.58,9.88],["c",-2.83,-15.85,-16.74,-30.35,-28.61,-40.76],["c",-10.69,-9.37,-29.08,-25.87,-43.37,-22.74],["c",-17.06,3.74,-37.87,16.5,-49.97,32.18],["c",-4.23,5.48,-6.55,8.41,-6.93,14.38],["c",-1.61,25.66,22.21,55.88,37.94,73.6],["l",59.29,-40.76],["c",-11.74,-1.83,-24.01,2.19,-34.96,0.15],["C",277.3,307.3,257.94,294.31,242,282.56],["z"]],"pathOffset":{"x":0,"y":0}},{"type":"path","originX":"left","originY":"top","left":198,"top":191.5,"width":396,"height":383,"fill":"#231F20","stroke":"#231F20","strokeWidth":0.5,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":2.61,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","path":[["M",230.41,183.38],["c",20.14,6.69,40.28,13.37,60.42,20.06],["l",2.97,0.99],["l",-0.33,3.12],["c",-2.58,24.06,-28.38,38.29,-50.78,31.04],["c",-11.27,-3.65,-21.17,-11.42,-24.43,-23.2],["c",-3.04,-11.02,0.85,-22.19,7.92,-30.78],["l",1.69,-2.06],["L",230.41,183.38],["z"]],"pathOffset":{"x":0,"y":0}},{"type":"path","originX":"left","originY":"top","left":198,"top":191.5,"width":396,"height":383,"fill":"#FFFFFF","stroke":"#231F20","strokeWidth":0.5,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":2.61,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","path":[["M",229.19,187.07],["c",-15.23,18.52,-8.18,40.42,14.7,47.82],["c",20.55,6.65,43.46,-6.62,45.72,-27.76],["C",269.47,200.44,249.33,193.76,229.19,187.07],["z"]],"pathOffset":{"x":0,"y":0}},{"type":"path","originX":"left","originY":"top","left":198,"top":191.5,"width":396,"height":383,"fill":"#231F20","stroke":"#231F20","strokeWidth":0.5,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":2.61,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","path":[["M",358.52,184.78],["c",7.07,8.6,10.96,19.76,7.92,30.78],["c",-3.25,11.79,-13.16,19.56,-24.43,23.2],["c",-22.41,7.25,-48.21,-6.98,-50.78,-31.04],["l",-0.33,-3.12],["l",2.97,-0.99],["c",20.14,-6.69,40.28,-13.37,60.42,-20.06],["l",2.53,-0.84],["L",358.52,184.78],["z"]],"pathOffset":{"x":0,"y":0}},{"type":"path","originX":"left","originY":"top","left":198,"top":191.5,"width":396,"height":383,"fill":"#FFFFFF","stroke":"#231F20","strokeWidth":0.5,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":2.61,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","path":[["M",355.52,187.25],["c",15.23,18.52,8.18,40.42,-14.7,47.82],["c",-20.55,6.65,-43.46,-6.62,-45.72,-27.76],["C",315.23,200.62,335.37,193.94,355.52,187.25],["z"]],"pathOffset":{"x":0,"y":0}},{"type":"path","originX":"left","originY":"top","left":198,"top":191.5,"width":396,"height":383,"fill":"#231F20","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","path":[["M",307.89,220.31],["c",5.05,0,9.17,-4.12,9.17,-9.17],["c",0,-5.05,-4.12,-9.17,-9.17,-9.17],["c",-5.05,0,-9.17,4.12,-9.17,9.17],["C",298.72,216.19,302.84,220.31,307.89,220.31],["z"]],"pathOffset":{"x":0,"y":0}},{"type":"path","originX":"left","originY":"top","left":198,"top":191.5,"width":396,"height":383,"fill":"#231F20","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","path":[["M",271.82,224.52],["c",7.05,0,12.79,-5.75,12.79,-12.79],["c",0,-7.05,-5.75,-12.79,-12.79,-12.79],["s",-12.79,5.75,-12.79,12.79],["C",259.02,218.77,264.77,224.52,271.82,224.52],["z"]],"pathOffset":{"x":0,"y":0}},{"type":"polygon","originX":"left","originY":"top","left":0,"top":0,"width":182.6,"height":63.5,"fill":"#231F20","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","points":[{"x":94.12,"y":13.860000000000014},{"x":-1.1599999999999966,"y":-17.74000000000001},{"x":7.689999999999998,"y":-49.639999999999986},{"x":97.94999999999999,"y":-5.039999999999992},{"x":167.57,"y":-38.120000000000005},{"x":181.44,"y":-12.430000000000007}]},{"type":"path","originX":"left","originY":"top","left":198,"top":191.5,"width":396,"height":383,"fill":"","stroke":"#231F20","strokeWidth":0.5,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":2.61,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","path":[["M",321.91,297.77],["c",0,1.22,0.16,3.83,-0.35,4.67],["c",-0.51,0.84,-0.88,3.38,-0.89,3.35]],"pathOffset":{"x":0,"y":0}},{"type":"path","originX":"left","originY":"top","left":198,"top":191.5,"width":396,"height":383,"fill":"#806B64","stroke":"#231F20","strokeWidth":0.5,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":2.61,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","path":[["M",321.91,297.77],["c",-3.92,-3.31,-8.1,-6.48,-12.51,-9.5],["c",-0.08,-0.01,-0.17,-0.01,-0.25,-0.02],["c",-10.95,-0.86,-21.58,-0.3,-32.52,0.14],["c",-6.65,0.27,-13.12,0.38,-19.61,0.08],["c",11.7,7.92,25.34,15.81,37.13,18.02],["c",6.82,1.27,14.76,-0.03,21.66,-0.5],["c",1.62,-0.11,3.24,-0.18,4.86,-0.2],["c",2.78,-0.03,5.56,0.1,8.32,0.53],["l",2.55,0.4],["C",328.54,303.65,325.33,300.66,321.91,297.77],["z"]],"pathOffset":{"x":0,"y":0}}]},{"type":"i-text","originX":"left","originY":"top","left":292,"top":251,"width":93.37,"height":26,"fill":"#ffffff","stroke":null,"strokeWidth":1,"strokeDashArray":null,"strokeLineCap":"butt","strokeLineJoin":"miter","strokeMiterLimit":10,"scaleX":1,"scaleY":1,"angle":0,"flipX":false,"flipY":false,"opacity":1,"shadow":null,"visible":true,"clipTo":null,"backgroundColor":"","text":"Angry Bird","fontSize":"20","fontWeight":"normal","fontFamily":"helvetica","fontStyle":"","lineHeight":1.3,"textDecoration":"","textAlign":"left","path":null,"textBackgroundColor":"","useNative":true,"styles":{}}],"background":""}'

    canvas.loadFromJSON(json, canvas.renderAll.bind(canvas), function (o, object) {
        //fabric.log(o, object);
        //. object.selectable = false;
        console.log(o);
    });

    //canvas.item(1).selectable = false;


    canvas.renderAll();


}


//////// Keyboard keys functions /////
$(document).bind("keydown", function (e) {
    var factor = 5;
    var activeObject = canvas.getActiveObject();

    // console.log(activeObject.left);
    // console.log(activeObject.top);


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


    if (activeObject) {
        if (activeObject.left > endX) {
            activeObject.left = endX;
        } else if (activeObject.left < startX) {
            activeObject.left = startX;
        }
        else if (activeObject.top > endY) {
            activeObject.top = endY;
        }
        else if (activeObject.top < startY) {
            activeObject.top = startY;
        }

    }
    updateModifications(true);
    canvas.counter++;
    newleft += 100;


});


canvas.on('object:moving', function (event) {

    var activeObject = canvas.getActiveObject();

    if (activeObject) {
        if (activeObject.left > endX) {
            activeObject.left = endX;
        } else if (activeObject.left < startX) {
            activeObject.left = startX;
        }
        else if (activeObject.top > endY) {
            activeObject.top = endY;
        }
        else if (activeObject.top < startY) {
            activeObject.top = startY;
        }

    }
    canvas.renderAll();
    updateModifications(true);
    canvas.counter++;
    newleft += 100;
});

// fabric.Image.fromURL(document.getElementById('img').src, function(image) {
//     canvas.add(image);
// });
//
// function showFilters() {
//     $(".filters").show();
// }
//
// function hideFilters() {
//     $(".filters").hide();
// }
//
// var filters = [
//     new fabric.Image.filters.Grayscale(),       // grayscale    0
//     new fabric.Image.filters.Sepia2(),          // sepia        1
//     new fabric.Image.filters.Invert(),          // invert       2
//
//     new fabric.Image.filters.Convolute({        // emboss       3
//         matrix: [ 1, 1, 1,
//             1, 0.7, -1,
//             -1, -1, -1 ]
//     }),
//
//     new fabric.Image.filters.Convolute({        // sharpen      4
//         matrix: [  0, -1, 0,
//             -1, 5, -1,
//             0, -1, 0 ]
//     })
// ];
//
// $(function() {
//     $('.filters').on("change", "input", function () {
//         var isChecked = $(this).prop("checked"),
//             filter = $(this).data("filter"),
//             //obj = canvas.getActiveObject();
//          activeObject = canvas.getActiveObject();
//
//
//         activeObject.filters[filter] = isChecked ? filters[filter] : null;
//         activeObject.applyFilters(function () {
//             canvas.renderAll();
//         });
//     });
// });

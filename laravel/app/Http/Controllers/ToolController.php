<?php

namespace App\Http\Controllers;

use App\Functions\Functions;
//use Intervention\Image\Facades\Image;
use Session;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator,
Input,
Redirect;
use Config;
use App\Products;
use App\ItemPosts;
use App\UserTextureImages;
use App\ProductsImages;
use App\Attributesvalues;
use App\ProductsCategories;
use App\Categories;
use Auth;
use App\Cart;
use App\Attributes;
use App\CartProductAttributes;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;
use App\CustomizedImages;

class ToolController extends Controller {

	private $sessionId;

	public function __construct() {

		$this->middleware('auth');
	}

	public function saveDesign(Request $request) {

		$data = $request->all();
		$user_id = Auth::user()->id;
		$model = new CustomizedImages();

		$model->product_id = $data['product_id'];
		$model->user_id = $user_id;
		$model->data = $data['design_data'];

		$model->title = $data['title'];
		$model->description = $data['description'];
		
		$model->orb_request = $data['orb_request'];

		$png_url = "product-" . time() . ".png";
		$large_path = public_path() . '/uploads/customize_products/large/' . $png_url;
		$medium_path = public_path() . '/uploads/customize_products/medium/' . $png_url;
		$small_path = public_path() . '/uploads/customize_products/small/' . $png_url;

		Functions::base64_to_jpeg($data['image_data2'], $large_path);

		$size = Config::get('params.customizedImageSize');
		$ratio = $size['originalHeight'] / $size['originalWidth'];

		Image::make($large_path)->resize($size['width_large'], $size['width_large'] * $ratio)->save($large_path);
		Image::make($large_path)->resize($size['width_medium'], $size['width_medium'] * $ratio)->save($medium_path);
		Image::make($large_path)->resize($size['width_small'], $size['width_small'] * $ratio)->save($small_path);
		$model->image_path = $png_url;

		if($data['design_id'] == 0){
			$model->save();
			$image_id = $model->id;
			return redirect('mydesigns/');
//             return redirect('design/'.$image_id);
			Session::flash('success', 'Your design has been created.');
		}

		else{
			$input['data'] = $data['design_data'];
			$input['title'] = $data['title'];
			$input['description'] = $data['description'];
			$input['image_path'] = $png_url;
			CustomizedImages::where('id', '=', $data['design_id'])->update($input);
			Session::flash('success', 'Your design has been updated.');
			return redirect('mydesigns/');
//             return redirect()->back();
		}  
	}

	public function delete($id) {

		$user_id = Auth::user()->id;
		$savedDesign = CustomizedImages::where("id", "=", $id)->where('user_id', "=", $user_id)->get();
		CustomizedImages::where('id', '=', $id)->where('user_id', "=", $user_id)->delete();

//        if(file_exists($fullpath))
		unlink(public_path() . '/uploads/customize_products/large/' . $savedDesign[0]->image_path);
		unlink(public_path() . '/uploads/customize_products/medium/' . $savedDesign[0]->image_path);
		unlink(public_path() . '/uploads/customize_products/small/' . $savedDesign[0]->image_path);

		return redirect('mydesigns');
	}

	public function myDesigns() {

		$user_id = Auth::user()->id;
		$mydesign = CustomizedImages::where("user_id", "=", $user_id)->get();

		return view('front.mydesign', compact('mydesign'));
	}

	public function getDesignDetail($design_id) {

		if (!isset(Auth::user()->id)) {
			return redirect('signup');
		} else {
			$user_id = Auth::user()->id;
			$savedDesign = CustomizedImages::where("id", "=", $design_id)->where('user_id', "=", $user_id)->get();
			$id = $savedDesign[0]->product_id;



//            $data = json_decode(($savedDesign[0]->data));
//            $data->objects[0]->selectable = false;
//            $savedDesign[0]->data = json_encode($data);

			$this->middleware('auth');
			$items = ItemPosts::getItem();
			$customize_items = [];

			foreach ($items as $item) {
				$customize_items[$item->cat_name][] = $item;
			}

			$product = Products::find($id);
			$productImages = array();
			$availabeInColors = array();
            //$productImages = ProductsImages::where('product_id', '=', $id)->get();
			$availabeInColors = Attributesvalues::getImagesAndColors($id);
			$productImages1 = Attributesvalues::getImagesAndColors($id);

			if(count($productImages1)>0)
				$productImages = $this->arrangeProductGallery($productImages1);

			$userTestures = UserTextureImages::where('user_id', '=', $user_id)->get();
			$category= ProductsCategories::where('product_id', '=', $id)->get();
			$category= Categories::find($category[0]['category_id']);

			$relatedProducts = array();

            //$relatedProducts=Products::where('category_id','=',$product->category_id)->limit(3)->get();
            //$category= Categories::find($product->category_id);
            //$category = array();

			$attributes = DB::table('attributes as a')
			->where('pa.product_id', '=', $id)
			->leftJoin('products_attributes as pa', 'pa.attribute_id', '=', 'a.id')
			->leftJoin('attributes_values as av', 'av.attribute_id', '=', 'a.id')
			->select('a.id as attribute_id', 'a.required as attribute_required', 'a.name as name', 'a.type as type', DB::raw('group_concat(av.id) as value_id'), DB::raw('group_concat(av.name) as value_names'), DB::raw('group_concat(av.price) as value_price'))
			->groupBy('a.id')
			->orderBy('av.sortOrder', 'asc')
			->get();


			return view('front.product_tool', compact('product', 'category', 'relatedProducts', 'attributes', 'productImages', 'availabeInColors', 'customize_items', 'savedDesign','userTestures'))->with('id', $id);
		}
	}

	public function showCartModal($product_id, $design_id) {

		$user_id = Auth::user()->id;

		$mydesign = CustomizedImages::where("user_id", "=", $user_id)->get();
		$customized_image = $mydesign[0]->image_path;

		$this->middleware('auth');
		$items = ItemPosts::getItem();
		$customize_items = [];

		foreach ($items as $item) {
			$customize_items[$item->cat_name][] = $item;
		}

		$product = Products::find($product_id);
		$productImages = array();
		$availabeInColors = array();
		$productImages = ProductsImages::where('product_id', '=', $product_id)->get();
		$availabeInColors = Attributesvalues::getImagesAndColors($product_id);
		$relatedProducts = array();
        //$relatedProducts=Products::where('category_id','=',$product->category_id)->limit(3)->get();
        //$category= Categories::find($product->category_id);
		$category = array();
		$attributes = DB::table('attributes as a')
		->where('pa.product_id', '=', $product_id)
		->leftJoin('products_attributes as pa', 'pa.attribute_id', '=', 'a.id')
		->leftJoin('attributes_values as av', 'av.attribute_id', '=', 'a.id')
		->select('a.id as attribute_id', 'a.required as attribute_required', 'a.name as name', 'a.type as type', DB::raw('group_concat(av.id) as value_id'), DB::raw('group_concat(av.name) as value_names'), DB::raw('group_concat(av.price) as value_price'))
		->groupBy('a.id')
		->orderBy('av.sortOrder', 'asc')
		->get();


		$id = $product_id;
		return view('front.common.cart_modal', compact('product', 'customized_image', 'category', 'relatedProducts', 'attributes', 'productImages', 'availabeInColors', 'customize_items', 'id'));
	}

	public function getTexturedImage($image_path,$product_caption,$selected_image,$texture_scale,$sole_color,$image_view,$texture_inside,$texture_outside,$texture_top,$apply_change = false) {

		$paths = [];

		$base_url = 'http://merchwiz.liquifire.com/merchwiz?';
		$texture_image = url('/').'/uploads/texture_patterns/'.$image_path;
		$product_image = "golpik/".$product_caption. ".jpg";
		$product_lgrd_file = "golpik/".$product_caption . ".lgrd";
		if($apply_change){
			$product_image = "golpik/shoes/cooper/".$product_caption. ".jpg";
			$product_lgrd_file = "golpik/shoes/cooper/".$product_caption . ".lgrd";	
		}

//		$logo_url = url('/')."/front/images/noimage.jpg";
                $logo_url = 'http://golpik.net/projects/laravel/merchwiz/front/images/noimage.jpg';
		$logo_x = -10;
		$logo_y = -10;
		$logo_width = '1';
		$logo_height = '1';
        // $chain_file = 'golpik/shoes_texture_logo_text_master.chain';
		$chain_file = 'golpik/white_shoes_v3.chain';
		$scale_size = '1982';
		$swatchDPI = '64';

		$text_size = '1';
		$text = '0';
		$text_color = '0';
		$font = 'VeraSansMono-Oblique';
		$text_x = '0';
		$text_y = '0';



        $a = $this->curlRequest($base_url.'set=gridfile%5Bfile:'.$product_lgrd_file.'%5D,h1%5B'.$logo_height.'%5D,imageDPI%5B'.$swatchDPI.'%5D,imagePer%5B'.$texture_scale.'%5D,image_i%5Bfile:'.$product_image.'%5D,image_w%5B'.$texture_image.'%5D,swatchDPI%5B72%5D,text%5B'.$text.'%5D,text_color%5B%'.$text_color.'%5D,text_font%5B'.$font.'%5D,text_point_size%5B'.$text_size.'%5D,text_x%5B'.$text_x.'%5D,text_y%5B'.$text_y.'%5D,thisLogo%5B'.$logo_url.'%5D,w1%5B'.$logo_width.'%5D,x1%5B'.$logo_x.'%5D,y1%5B'.$logo_y.'%5D&call=url%5Bfile:'.$chain_file.'%5D&scale=size%5B'.$scale_size.'%5D&sink');
		$png_url = "textured-" . time() . ".jpg";
		$large_path = public_path() . '/uploads/liquid_pixel/'.$png_url;

		$fp = fopen($large_path,'x');
		fwrite($fp, $a);
		fclose($fp);

		$paths[0]['liquid_pixel_image'] = $png_url;
		$paths[0]['actual'] = $selected_image;
		$paths[0]['caption'] = $product_caption;
		$paths[0]['texture_path'] = $image_path;
		$paths[0]['editable'] = true;
		$paths[0]['image_view'] = $image_view;

		sleep(2);

		$png_url = "textured-" . time() . ".jpg";
		$large_path = public_path() . '/uploads/liquid_pixel/'.$png_url;

		$product_caption_new = str_replace("_factory","",$product_caption);
		$image_view_new = str_replace(" factory","",$image_view);

		$product_image = "golpik/".$product_caption_new.'_'.$sole_color . ".jpg";
		$product_lgrd_file = "golpik/".$product_caption_new . ".lgrd";
		
		if($apply_change){
			$product_image = "golpik/shoes/cooper/".$product_caption_new.'_'.$sole_color . ".jpg";
			$product_lgrd_file = "golpik/shoes/cooper/".$product_caption_new . ".lgrd";	
		}
		
		$a = $this->curlRequest($base_url.'set=gridfile%5Bfile:'.$product_lgrd_file.'%5D,h1%5B'.$logo_height.'%5D,imageDPI%5B'.$swatchDPI.'%5D,imagePer%5B'.$texture_scale.'%5D,image_i%5Bfile:'.$product_image.'%5D,image_w%5B'.$texture_image.'%5D,swatchDPI%5B72%5D,text%5B'.$text.'%5D,text_color%5B%'.$text_color.'%5D,text_font%5B'.$font.'%5D,text_point_size%5B'.$text_size.'%5D,text_x%5B'.$text_x.'%5D,text_y%5B'.$text_y.'%5D,thisLogo%5B'.$logo_url.'%5D,w1%5B'.$logo_width.'%5D,x1%5B'.$logo_x.'%5D,y1%5B'.$logo_y.'%5D&call=url%5Bfile:'.$chain_file.'%5D&scale=size%5B'.$scale_size.'%5D&sink');

		$png_url = "textured-" . time() . ".jpg";
		$large_path = public_path() . '/uploads/liquid_pixel/'.$png_url;

		$fp = fopen($large_path,'x');
		fwrite($fp, $a);
		fclose($fp);

		$paths[1]['liquid_pixel_image'] = $png_url;
		$paths[1]['actual'] = $selected_image;
		$paths[1]['caption'] = $product_caption_new;
		$paths[1]['texture_path'] = $image_path;
		$paths[1]['editable'] = false;
		$paths[1]['image_view'] = $image_view_new;

		sleep(2);

		$pair_imagepath =  $this->getPairTexturedImage('shoes_pair',$sole_color,$texture_inside,$texture_outside,$texture_top);

		$paths[2]['liquid_pixel_image'] = $pair_imagepath;
		$paths[2]['actual'] = $selected_image;
		$paths[2]['caption'] = $product_caption_new;
		$paths[2]['texture_path'] = $image_path;
		$paths[2]['editable'] = false;
		$paths[2]['image_view'] = 'pair';

		return $paths;

	}


	public function getTexturedImageForAll($image_path,$product_id,$texture_scale,$sole_color) {
		
		$apply_change = false;
		if($product_id == 16)
                    $apply_change = true;

		$paths = [];
		$i = 0;

		$productImages = Attributesvalues::getImagesAndColors($product_id);
		$productImages = $this->arrangeProductGallery($productImages);

		foreach($productImages as $img){

			$product_image = "golpik/".$img->caption. ".jpg";
			
			if($apply_change)
				$product_image = "golpik/shoes/cooper/".$img->caption. ".jpg";
				
			$editable = true;

			if (strpos($img->name, 'factory') !== false) {
				$product_image = "golpik/".$img->caption. ".jpg";
				
				if($apply_change)
					$product_image = "golpik/shoes/cooper/".$img->caption. ".jpg";
                                                                   
				$editable = true;

			} else{
				$product_image = "golpik/".$img->caption.'_'.$sole_color . ".jpg";
				
				if($apply_change)
					$product_image = "golpik/shoes/cooper/".$img->caption.'_'.$sole_color . ".jpg";
				$editable = false; 
			}
                        
                        $paths[0]['shm_product_image'] = $product_image;
                        
                        if($img->name == 'preview'){
//                            for  3D preview of image
                            $pair_imagepath =  $this->getPairPreviewImage($img->caption, $sole_color, $image_path);
                            $parts = explode('#', $pair_imagepath);
                            $paths[$i]['liquid_pixel_image'] = $parts[0];
                            $paths[$i]['orb_req'] = $parts[1];
                        }

			if($img->name != 'pair' && $img->name != 'preview'){

				$base_url = 'http://merchwiz.liquifire.com/merchwiz?';
				// ui task to create texture image
				$texture_image = url('/').'/uploads/texture_patterns/large/'.$image_path;
				$product_lgrd_file = "golpik/".$img->caption . ".lgrd";
	
				if($apply_change)
					$product_lgrd_file = "golpik/shoes/cooper/".$img->caption . ".lgrd";
                                
                                if($img->caption=="factory_tongue_web"){
                                    $product_image = "golpik/shoes/cooper/m13/factory_tongue_large.png";
                                    $product_lgrd_file = "golpik/shoes/cooper/m13/factory_tongue_large.lgrd";
                                    $texture_image = url('/').'/uploads/texture_patterns/large/'.$image_path;
                                    $chain_file = 'golpik/web_shoes.chain';
                                } else if($img->caption=="factory_outside_web"){
                                    $product_image = "golpik/shoes/cooper/m13/factory_outside_large.png";
                                    $product_lgrd_file = "golpik/shoes/cooper/m13/factory_outside_large.lgrd";
                                    $texture_image = url('/').'/uploads/texture_patterns/large/'.$image_path;
                                    $chain_file = 'golpik/web_shoes.chain';
                                } else if($img->caption=="factory_inside_web"){
                                    $product_image = "golpik/shoes/cooper/m13/factory_inside_large.png";
                                    $product_lgrd_file = "golpik/shoes/cooper/m13/factory_inside_large.lgrd";
                                    $texture_image = url('/').'/uploads/texture_patterns/large/'.$image_path;
                                    $chain_file = 'golpik/web_shoes.chain';
                                } else {
                                    $product_image = "golpik/shoes/cooper/".$img->caption.'_'.$sole_color . ".jpg";
                                    $product_lgrd_file = "golpik/shoes/cooper/".$img->caption . ".lgrd";
                                    $texture_image = url('/').'/uploads/texture_patterns/large/'.$image_path;
                                    $chain_file = 'golpik/white_shoes_v3.chain';
                                    
                                }
				
				$paths[0]['shm_product_lgrd_file'] = $product_lgrd_file;
                                
//				$logo_url = url('/')."/front/images/noimage.jpg";
                                $logo_url = 'http://golpik.net/projects/laravel/merchwiz/front/images/noimage.jpg';
				$logo_x = -10;
				$logo_y = -10;
				$logo_width = '1';
				$logo_height = '1';
//				$chain_file = 'golpik/white_shoes_v3.chain';
				$scale_size = '1982';
				$swatchDPI = '64';
				$text_size = '1';
				$text = '0';
				$text_color = '0';
				$font = 'VeraSansMono-Oblique';
				$text_x = '0';
				$text_y = '0';
				$orb_req = $base_url.'set=gridfile%5Bfile:'.$product_lgrd_file.'%5D,h1%5B'.$logo_height.'%5D,imageDPI%5B'.$swatchDPI.'%5D,imagePer%5B'.$texture_scale.'%5D,image_i%5Bfile:'.$product_image.'%5D,image_w%5B'.$texture_image.'%5D,swatchDPI%5B72%5D,text%5B'.$text.'%5D,text_color%5B%'.$text_color.'%5D,text_font%5B'.$font.'%5D,text_point_size%5B'.$text_size.'%5D,text_x%5B'.$text_x.'%5D,text_y%5B'.$text_y.'%5D,thisLogo%5B'.$logo_url.'%5D,w1%5B'.$logo_width.'%5D,x1%5B'.$logo_x.'%5D,y1%5B'.$logo_y.'%5D&call=url%5Bfile:'.$chain_file.'%5D&scale=size%5B'.$scale_size.'%5D&sink';
				$paths[$i]['orb_req'] = $orb_req;	
				$a = $this->curlRequest($orb_req);
				$png_url = "textured-" .$i. time() . ".jpg";
				$large_path = public_path() . '/uploads/liquid_pixel/'.$png_url;

				$fp = fopen($large_path,'x');
				fwrite($fp, $a);
				fclose($fp);

				$paths[$i]['liquid_pixel_image'] = $png_url;

			} 

			/* 
			 * shm: This part has closed temporarily until pair image is activated
			 * else{
				$pair_imagepath =  $this->getPairTexturedImage($img->caption,$sole_color,$image_path,$image_path,$image_path,$apply_change);
				$paths[$i]['liquid_pixel_image'] = $pair_imagepath;
			}
			* */

			$paths[$i]['actual'] = $img->image;
			$paths[$i]['caption'] = $img->caption;
			$paths[$i]['texture_path'] = $image_path;
			$paths[$i]['editable'] = $editable;
			$paths[$i]['image_view'] = $img->name;

			sleep(2);
			$i++;

		}
                
                //print_r($paths); die;
		return $paths;
	}        
        
        public function getPairPreviewImage($caption,$sole_color,$texture) {

            $base_url = 'http://merchwiz.liquifire.com/merchwiz?';
            $product_image = "golpik/3d/shoes-pair.jpg";
            $chain_file = "golpik/3d/preview.chain";

            $texture = url('/').'/uploads/texture_patterns/large/'.$texture;

            $left_inside_lgrd = "golpik/3d/inside.lgrd";
            $left_outside_lgrd = "golpik/3d/outside.lgrd";
            
            $requ_url = $base_url.'set=grid_l_inside%5Bfile:'.$left_inside_lgrd.'%5D,grid_l_outside%5Bfile:'.$left_outside_lgrd.'%5D,image_i%5Bfile:'.$product_image.'%5D,texture%5B'.$texture.'%5D&call=url%5Bfile:'.$chain_file.'%5D&scale=size%5B1982%5D&sink';
            $a = $this->curlRequest($requ_url);
            $png_url = "preview-" . time() . ".jpg";
            $large_path = public_path() . '/uploads/liquid_pixel/'.$png_url;

            $fp = fopen($large_path,'x');
            fwrite($fp, $a);
            fclose($fp);

            sleep(1);

            return $png_url.'#'.$requ_url;

	}

	public function getPairTexturedImage($caption,$sole_color,$texture_inside,$texture_outside,$texture_top,$apply_change = false) {

     	// $paths = [];

		$base_url = 'http://merchwiz.liquifire.com/merchwiz?';
		$product_image = "golpik/".$caption.'_'.$sole_color . ".jpg";
		if($apply_change)
			$product_image = "golpik/shoes/cooper/".$caption.'_'.$sole_color . ".jpg";
		$chain_file = 'golpik/white_shoes_pair.chain';

		$texture_inside = url('/').'/uploads/texture_patterns/'.$texture_inside;
		$texture_outside = url('/').'/uploads/texture_patterns/'.$texture_outside;
		$texture_top = url('/').'/uploads/texture_patterns/'.$texture_top;

     	// white_pair_shoes_

		$left_inside_lgrd = "golpik/white-shoes/white_pair_inside.lgrd";
		$left_outside_lgrd = "golpik/white-shoes/white_pair_outside.lgrd";
		$left_top_lgrd = "golpik/white-shoes/white_pair_tongue.lgrd";

		$right_inside_lgrd = "golpik/white-shoes/right_white_pair_inside.lgrd";;
		$right_outside_lgrd = "golpik/white-shoes/right_white_pair_outside.lgrd";
		$right_top_lgrd = "golpik/white-shoes/shoes_pair_tongue_inside.lgrd";
		
		if($apply_change){
			$left_inside_lgrd = "golpik/shoes/cooper/shoes_pair_left_inside.lgrd";
			$left_outside_lgrd = "golpik/shoes/cooper/shoes_pair_left_outside.lgrd";
			$left_top_lgrd = "golpik/shoes/cooper/shoes_pair_tongue_inside.lgrd";

			$right_inside_lgrd = "golpik/shoes/cooper/shoes_pair_right_inside.lgrd";;
			$right_outside_lgrd = "golpik/shoes/cooper/shoes_pair_right_outside.lgrd";
			$right_top_lgrd = "golpik/shoes/cooper/shoes_pair_right_tongue.lgrd";	
		}

		$a = $this->curlRequest($base_url.'set=grid_l_inside%5Bfile:'.$left_inside_lgrd.'%5D,grid_l_outside%5Bfile:'.$left_outside_lgrd.'%5D,grid_l_top%5Bfile:'.$left_top_lgrd.'%5D,grid_r_inside%5Bfile:'.$right_inside_lgrd.'%5D,grid_r_outside%5Bfile:'.$right_outside_lgrd.'%5D,grid_r_top%5Bfile:'.$right_top_lgrd.'%5D,image_i%5Bfile:'.$product_image.'%5D,image_w_inside%5B'.$texture_inside.'%5D,image_w_outside%5B'.$texture_outside.'%5D,image_w_top%5B'.$texture_top.'%5D&call=url%5Bfile:'.$chain_file.'%5D&scale=size%5B1982%5D&sink');        

		$png_url = "textured-" . time() . ".jpg";
//                $png_url = "textured-img" . ".jpg";
		$large_path = public_path() . '/uploads/liquid_pixel/'.$png_url;

		$fp = fopen($large_path,'x');
		fwrite($fp, $a);
		fclose($fp);

		sleep(1);

		return $png_url;

	}


	private function curlRequest($url){

		$curl = curl_init();
		header("Content-Type: image/jpeg");
		curl_setopt($curl, CURLOPT_URL, $url);
       	// curl_setopt($curl, CURLOPT_HTTPHEADER, array('key: 3I8dKt55Nw7kO5rX9xLf27YgHi4370')); //setting custom header
		curl_setopt($curl, CURLOPT_FAILONERROR, true);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

		$result = curl_exec($curl);
		curl_close($curl);
		return $result;

	}


	public function saveTextureImage(Request $request) {

		$data = $request->all();
		$user_id = Auth::user()->id;

		$model = new UserTextureImages;

		try {
			$absoluteAssetFolder = public_path() . '/uploads/texture_patterns/';

			foreach ($_FILES as $key => $item) {
				if ($item["error"] == "0") {
					$content_type = strtolower(substr($item["name"], strpos($item["name"], ".") + 1, strlen($item["name"])));
					$original_media_name = "texture_pattern" . '_' . time() . "_" . $key . "." . $content_type;
					$new_file_path = $absoluteAssetFolder . $original_media_name;
					$converted = move_uploaded_file($item["tmp_name"], $new_file_path);
					$optimized_media_name[$key] = $original_media_name;
				}
			}

			$model->user_id = $user_id;
			$model->image = $original_media_name;
			$model->save();
			$data1['id'] = $model->id;
			$data1['image_path'] = $original_media_name;

		} catch (Exception $e) {
			return "No media found";
		}

		return $data1;

	}

   	// shm: func to add custom item image on canvas
	public function saveCustomItemImage(Request $request) {
		$data = $request->all();
		$user_id = Auth::user()->id;
       	// $model = new UserTextureImages;

		try {
			$absoluteAssetFolder = public_path() . '/uploads/tool_items/';
			foreach ($_FILES as $key => $item) {
				if ($item["error"] == "0") {
					$content_type = strtolower(substr($item["name"], strpos($item["name"], ".") + 1, strlen($item["name"])));
					$original_media_name = "custom_" . '_' . time() . "_" . $user_id . "." . $content_type;
					$new_file_path = $absoluteAssetFolder . $original_media_name;
					$converted = move_uploaded_file($item["tmp_name"], $new_file_path);

					Image::make($new_file_path)->resize(400, 400)->save($new_file_path);

				}
			}
          	// $model->user_id = $user_id;
           	// $model->image = $original_media_name;


          	// $model->save();
		} catch (Exception $e) {
			return "No media found";
		}
		return $original_media_name;
	}


	public function getTexturedLogoImage($source_image,$texture_path,$product_name,$logo_url,$logo_x,$logo_y,$logo_width,$logo_height) {

		$paths = [];

		$base_url = 'http://merchwiz.liquifire.com/merchwiz?';
		$texture_image = url('/').'/uploads/texture_patterns/'.$texture_path;
		$product_image = "golpik/".$product_name . ".jpg";
		$product_lgrd_file = "golpik/".$product_name . ".lgrd";
		$logo_url = "http://ecommercehouse.com/projects/merchwiz/uploads/tool_items/2021500480454.png";
		$chain_file = 'golpik/shoes_texture_logo_master.chain';
		$scale_size = '1982';
		$swatchDPI = '72';

		$a = $this->curlRequest($base_url.'set=gridfile%5Bfile:'.$product_lgrd_file.'%5D,h1%5B72%5D,imageDPI%5B'.$swatchDPI.'%5D,image_i%5Bfile:'.$product_image.'%5D,image_w%5B'.$texture_image.'%5D,swatchDPI%5B72%5D,thisLogo%5B'.$logo_url.'%5D,w1%5B'.$logo_width.'%5D,x1%5B'.$logo_x.'%5D,y1%5B'.$logo_y.'%5D&call=url%5Bfile:'.$chain_file.'%5D&scale=size%5B'.$scale_size.'%5D&sink');
       	// echo 'req-shm: '.$a.'<br>';
		$png_url = "textured-" . time() . ".jpg";
		$large_path = public_path() . '/uploads/liquid_pixel/'.$png_url;

		$fp = fopen($large_path,'x');
		fwrite($fp, $a);
		fclose($fp);

		$paths[0]['liquid_pixel_image'] = $png_url;
		$paths[0]['actual'] = $source_image;
		$paths[0]['caption'] = $product_name;
		$paths[0]['texture_path'] = $texture_path;
		$paths[$i]['editable'] = true;

		return $paths;

	}

	public function getTexturedLogoTextImage($source_image,$texture_path,$product_name,$logo_url,$logo_x,$logo_y,$logo_width,$logo_height,$text,$font,$text_size,$text_color,$text_x,$text_y,$texture_scale,$sole_color) {

		$paths = [];

		$product_lgrd_file = "golpik/".$product_name . ".lgrd";
		$base_url = 'http://merchwiz.liquifire.com/merchwiz?';
		$texture_image = url('/').'/uploads/texture_patterns/'.$texture_path;

		$product_image = "golpik/".$product_name.'_'.$sole_color . ".jpg";

		$logo_url =  asset('uploads/tool_items')."/".$logo_url;
		$chain_file = 'golpik/white_shoes_v3.chain';
		$scale_size = '1982';
		$swatchDPI = '72';
       	// $font = 'VeraSansMono-Oblique';
		$text_color = '25%23'.$text_color;

		$a = $this->curlRequest($base_url.'set=gridfile%5Bfile:'.$product_lgrd_file.'%5D,h1%5B'.$logo_height.'%5D,imageDPI%5B'.$swatchDPI.'%5D,imagePer%5B'.$texture_scale.'%5D,image_i%5Bfile:'.$product_image.'%5D,image_w%5B'.$texture_image.'%5D,swatchDPI%5B72%5D,text%5B'.$text.'%5D,text_color%5B%'.$text_color.'%5D,text_font%5B'.$font.'%5D,text_point_size%5B'.$text_size.'%5D,text_x%5B'.$text_x.'%5D,text_y%5B'.$text_y.'%5D,thisLogo%5B'.$logo_url.'%5D,w1%5B'.$logo_width.'%5D,x1%5B'.$logo_x.'%5D,y1%5B'.$logo_y.'%5D&call=url%5Bfile:'.$chain_file.'%5D&scale=size%5B'.$scale_size.'%5D&sink');
		$png_url = "textured-" . time() . ".jpg";
		$large_path = public_path() . '/uploads/liquid_pixel/'.$png_url;

		$fp = fopen($large_path,'x');
		fwrite($fp, $a);
		fclose($fp);

		$paths[0]['liquid_pixel_image'] = $png_url;
		$paths[0]['actual'] = $source_image;
		$paths[0]['caption'] = $product_name;
		$paths[0]['texture_path'] = $texture_path;
		$paths[$i]['editable'] = true;


		return $paths;

	}

	public function getTexturedImageFromCanvas(Request $request) {
       	
       	$apply_change = false;
       	$g_product_id = $_POST['g_product_id'];
       	if($g_product_id == 16)
            $apply_change = true;
       	
       	$sole_color = $request->sole_color;
        $product_caption = $request->product_caption;
        $image_path = $request->texture_path;
        $selected_image = $request->texture_path;
        $selected_image_view = $request->image_view;

        $texture_inside = $request->texture_inside;
        $texture_outside = $request->texture_outside;
        $texture_top = $request->texture_top;

       	$request = $_REQUEST['target_type'];
        $base_url = 'http://merchwiz.liquifire.com/merchwiz?';
        $canvas_image = $_REQUEST['canvas_image'];
       	
       	$factory_img = "factory-" . time() . ".jpg";
        $factory_path = public_path() . '/uploads/liquid_pixel/'.$factory_img;
        $factory_url = url('/').'/uploads/liquid_pixel/'.$factory_img;
		
        // for large factory template
		
        $large_factory_img = "large_factory-" . time() . ".jpg";
        $large_factory_path = public_path() . '/uploads/liquid_pixel/'.$large_factory_img;
        $large_factory_url = url('/').'/uploads/liquid_pixel/'.$large_factory_img;
		
        $gridfile = 'file:merchwiz/black_cooper_Loutside.lgrd';
        $image_i = $canvas_image;

        if($apply_change){
            $gridfile = 'file:golpik/shoes/cooper/'.$product_caption.'.lgrd';
            $image_i = 'file:golpik/shoes/cooper/'.$product_caption.'.png';
        }

		$chain_file = 'golpik/user_template_view.chain';
                $chain_file_factory = 'golpik/factory_template_view.chain';

		$h1 = 120; 
		$imageDPI = 64;
 		$image_w = url('/').'/uploads/texture_patterns/'.$_POST['image_w'];
		$swatchDPI = 72;

		$text = $_REQUEST['text'];
		if(isset($text))
                $text = str_replace(" ","%20", $text);
		$text_font = $_REQUEST['text_font'];
		$text_x = $_REQUEST['text_x'];
		$text_y = $_REQUEST['text_y'];
		$text_point_size = $_REQUEST['text_point_size'];
		$text_color = $_REQUEST['text_color'];
		if(isset($text_color))
                    $text_color = str_replace("#","%23", $text_color);

		$item_x = $_REQUEST['item_x'];
		$item_y = $_REQUEST['item_y'];
		$item_w = $_REQUEST['item_w'];
		$item_h = $_REQUEST['item_h'];
		$item_src = $_REQUEST['item_src'];                
		$thisItem =  url('/') . '/uploads/tool_items/' . $item_src;
		
		$facitem_w = $item_w - 75;
                $facitem_w = $item_w;
		$facitem_h = $item_h;
                if($product_caption == 'factory_tongue_web'){			
			$webitem_w = $item_w - 117;
			$webitem_x = $item_x + 115;
			$webitem_y = $item_y + 19;
			$webtext_x = $text_x + 17;
			$webtext_y = $text_y - 20;
		} else{
			$webitem_w = $item_w - 75;
			$webitem_x = $item_x;
			$webitem_y = $item_y;
			$webtext_x = $text_x;
			$webtext_y = $text_y;		
		}
//                new script shm added
                $webitem_w = $item_w;
                $webitem_h = $item_h;
                $webitem_x = $item_x;
                $webitem_y = $item_y;
                $webtext_x = $text_x;
                $webtext_y = $text_y;
		
                $lrggridfile = 'file:golpik/shoes/cooper/m13/'.str_replace('web', 'large', $product_caption).'.lgrd';
                $lrgimage_i = 'file:golpik/shoes/cooper/m13/'.str_replace('web', 'large', $product_caption).'.png';
                $lrgimage_w = url('/').'/uploads/texture_patterns/large/'.$_POST['image_w'];
//		 request for web factory template
//		$orb_req = $base_url.'set=gridfile%5B'.$gridfile.'%5D,h1%5B'.$h1.'%5D,imageDPI%5B'.$imageDPI.'%5D,image_i%5B'.$image_i.'%5D,image_w%5B'.$image_w.'%5D,swatchDPI%5B'.$swatchDPI.'%5D,text%5B'.$text.'%5D,text_color%5B'.$text_color.'%5D,text_font%5B'.$text_font.'%5D,text_point_size%5B'.$text_point_size.'%5D,text_x%5B'.$text_x.'%5D,text_y%5B'.$text_y.'%5D,thisLogo%5B'.$thisItem.'%5D,w1%5B'.$facitem_w.'%5D,h1%5B'.$facitem_h.'%5D,x1%5B'.$item_x.'%5D,y1%5B'.$item_y.'%5D&call=url%5Bfile:'.$chain_file.'%5D&sink';                
		$orb_req = $base_url.'set=gridfile%5B'.$lrggridfile.'%5D,h1%5B'.$h1.'%5D,imageDPI%5B'.$imageDPI.'%5D,image_i%5B'.$lrgimage_i.'%5D,image_w%5B'.$lrgimage_w.'%5D,swatchDPI%5B'.$swatchDPI.'%5D,text%5B'.$text.'%5D,text_color%5B'.$text_color.'%5D,text_font%5B'.$text_font.'%5D,text_point_size%5B'.$text_point_size.'%5D,text_x%5B'.$text_x.'%5D,text_y%5B'.$text_y.'%5D,thisLogo%5B'.$thisItem.'%5D,w1%5B'.$item_w.'%5D,h1%5B'.$item_h.'%5D,x1%5B'.$item_x.'%5D,y1%5B'.$item_y.'%5D&call=url%5Bfile:'.$chain_file_factory.'%5D&sink';
                $a = $this->curlRequest($orb_req);             

		$fp = fopen($factory_path,'x');
		fwrite($fp, $a);
		fclose($fp);
		
//                for large factory template
		$lrggridfile = 'file:golpik/shoes/cooper/replace/'.str_replace('web', 'large', $product_caption).'.lgrd';
		$lrgimage_i = 'file:golpik/shoes/cooper/replace/'.str_replace('web', 'large', $product_caption).'.png';
		
		
		$lrgtext_point_size = round($text_point_size*2.6);
		$lrgtext_x = round($text_x*2.5);
                $lrgtext_y = round($text_y*1.5);
                $lrgitem_x = round($item_x*2.64);
                $lrgitem_y = round($item_y*1.5);
                    
                if($selected_image_view == 'outside factory'){
                    if($text_x>200)
                        $lrgtext_x += 70;                    
                    if($item_x>200)
                        $lrgitem_x += 220;
                    else
                        $lrgitem_x += 330;
                    
                }
                if($selected_image_view == 'inside factory'){
                    if($item_x>200)
                        $lrgitem_x += 48;

                    if($item_y>200)
                        $lrgitem_y += 220;
                    else
                    $lrgitem_y += 100;
                
                }
		
		$lrgitem_w = round($item_w*2);
		$lrgitem_h = round($item_h*2);
                
                
                
                $lrgtext_point_size = $text_point_size;
		$lrgtext_x = $text_x;
                $lrgtext_y = $text_y;
                $lrgitem_x = $item_x;
                $lrgitem_y = $item_y;
                
                $lrgitem_w = $item_w;
		$lrgitem_h = $item_h;
                
		$orb_large_req = $base_url.'set=gridfile%5B'.$lrggridfile.'%5D,h1%5B'.$h1.'%5D,imageDPI%5B'.$imageDPI.'%5D,image_i%5B'.$lrgimage_i.'%5D,image_w%5B'.$lrgimage_w.'%5D,swatchDPI%5B'.$swatchDPI.'%5D,text%5B'.$text.'%5D,text_color%5B'.$text_color.'%5D,text_font%5B'.$text_font.'%5D,text_point_size%5B'.$lrgtext_point_size.'%5D,text_x%5B'.$lrgtext_x.'%5D,text_y%5B'.$lrgtext_y.'%5D,thisLogo%5B'.$thisItem.'%5D,w1%5B'.$lrgitem_w.'%5D,h1%5B'.$lrgitem_h.'%5D,x1%5B'.$lrgitem_x.'%5D,y1%5B'.$lrgitem_y.'%5D&call=url%5Bfile:'.$chain_file_factory.'%5D&sink';
		
		// $user_img = $png_url1  $user_path = $large_path1
		$user_img = "product-" . time() . ".jpg";
		$user_path = public_path() . '/uploads/liquid_pixel/' . $user_img;
		
		$paths = [];

		// $texture_image = url('/').'/uploads/liquid_pixel/'.$user_img;

		$new_caption =  str_replace("_factory","",$product_caption);
            
		$image_i = "golpik/".$new_caption.'_'.$sole_color . ".jpg";
		$image_view = str_replace(" factory","",$selected_image_view);
		if($apply_change) {
			// $image_i = "golpik/shoes/cooper/".$new_caption.'_'.$sole_color . ".jpg";
			$image_view = $image_view == 'top' ? 'tongue' : $image_view;
//			$gridfile = 'file:golpik/shoes/cooper/shoes_'.$image_view.'.lgrd';			
//			$image_i = "golpik/shoes/cooper/shoes_".$image_view.'_'.$sole_color . ".jpg";
                        $gridfile = 'file:golpik/shoes/cooper/m13/shoes_'.$image_view.'.lgrd';
                        $image_i = "golpik/shoes/cooper/m13/shoes_".$image_view.'_'.$sole_color . ".jpg";
			$image_view = $image_view == 'tongue' ? 'top' : $image_view;
		}
                
                
//                web user view		
                $orb_req2 = $base_url.'set=gridfile%5B'.$gridfile.'%5D,h1%5B'.$h1.'%5D,imageDPI%5B'.$imageDPI.'%5D,image_i%5Bfile:'.$image_i.'%5D,image_w%5B'.$lrgimage_w.'%5D,swatchDPI%5B'.$swatchDPI.'%5D,text%5B'.$text.'%5D,text_color%5B'.$text_color.'%5D,text_font%5B'.$text_font.'%5D,text_point_size%5B'.$text_point_size.'%5D,text_x%5B'.$text_x.'%5D,text_y%5B'.$text_y.'%5D,thisLogo%5B'.$thisItem.'%5D,w1%5B'.$item_w.'%5D,h1%5B'.$item_h.'%5D,x1%5B'.$item_x.'%5D,y1%5B'.$item_y.'%5D&call=url%5Bfile:'.$chain_file.'%5D&sink';
//                $orb_req2 = $base_url.'set=gridfile%5B'.$lrggridfile.'%5D,h1%5B'.$h1.'%5D,imageDPI%5B'.$imageDPI.'%5D,image_i%5B'.$lrgimage_i.'%5D,image_w%5B'.$lrgimage_w.'%5D,swatchDPI%5B'.$swatchDPI.'%5D,text%5B'.$text.'%5D,text_color%5B'.$text_color.'%5D,text_font%5B'.$text_font.'%5D,text_point_size%5B'.$text_point_size.'%5D,text_x%5B'.$text_x.'%5D,text_y%5B'.$text_y.'%5D,thisLogo%5B'.$thisItem.'%5D,w1%5B'.$item_w.'%5D,h1%5B'.$item_h.'%5D,x1%5B'.$item_x.'%5D,y1%5B'.$item_y.'%5D&call=url%5Bfile:'.$chain_file.'%5D&sink';
//                $orb_req2 = $base_url.'set=gridfile%5B'.$gridfile.'%5D,h1%5B'.$h1.'%5D,imageDPI%5B'.$imageDPI.'%5D,image_i%5Bfile:'.$image_i.'%5D,image_w%5B'.$image_w.'%5D,swatchDPI%5B'.$swatchDPI.'%5D,text%5B'.$text.'%5D,text_color%5B'.$text_color.'%5D,text_font%5B'.$text_font.'%5D,text_point_size%5B'.$text_point_size.'%5D,text_x%5B'.$webtext_x.'%5D,text_y%5B'.$webtext_y.'%5D,thisLogo%5B'.$thisItem.'%5D,w1%5B'.$webitem_w.'%5D,h1%5B'.$webitem_h.'%5D,x1%5B'.$webitem_x.'%5D,y1%5B'.$webitem_y.'%5D&call=url%5Bfile:'.$chain_file.'%5D&sink';
		$a = $this->curlRequest($orb_req2);
		
		$fp = fopen($user_path,'x');
		fwrite($fp, $a);
		fclose($fp);
            
		$paths[0]['orb_req'] = $orb_req;
		$paths[0]['orb_large_req'] = $orb_large_req;
		$paths[0]['orb_req2'] = $orb_req2;
		$paths[0]['selected_image_view'] =  $selected_image_view;
		$paths[0]['factory_url'] = $factory_url;
		$paths[0]['large_factory_url'] = $large_factory_url;
		$paths[0]['png_url1'] = $user_img;

		$paths[0]['liquid_pixel_image'] = $user_img;
		$paths[0]['actual'] = $selected_image;
		$paths[0]['caption'] = $new_caption;
		$paths[0]['texture_path'] = $image_path;
		$paths[0]['editable'] = false;			
		$paths[0]['image_view'] = $image_view;

		sleep(2);
            

		if($selected_image_view == 'inside factory')
		// $texture_inside = $png_url1;
			$texture_inside = $user_img;
		else if($selected_image_view == 'outside factory')
		// $texture_outside = $png_url1;
			$texture_outside = $user_img;
		else if($selected_image_view == 'top factory')
		// $texture_top = $png_url1;
			$texture_top = $user_img;
		$pair_imagepath =  $this->getPairTexturedImage('white_pair_shoes',$sole_color,$texture_inside,$texture_outside,$texture_top);

		$paths[1]['liquid_pixel_image'] = $pair_imagepath;
		$paths[1]['actual'] = $selected_image;
		$paths[1]['caption'] = $new_caption;
		$paths[1]['texture_path'] = $image_path;
		$paths[1]['editable'] = false;
		$paths[1]['image_view'] = 'pair';

		sleep(1);
		return $paths;        

	}

        public function arrangeProductGallery($productImages1){

        	for($i=0; $i<count($productImages1); $i++){

        		if($productImages1[$i]->name == 'pair')
        			$productImages[0] = $productImages1[$i];
        		elseif($productImages1[$i]->name == 'inside')
        			$productImages[1] = $productImages1[$i];
        		elseif($productImages1[$i]->name == 'outside')
        			$productImages[2] = $productImages1[$i];
        		elseif($productImages1[$i]->name == 'top')
        			$productImages[3] = $productImages1[$i];
        		elseif($productImages1[$i]->name == 'top factory')
        			$productImages[4] = $productImages1[$i];
        		elseif($productImages1[$i]->name == 'outside factory')
        			$productImages[5] = $productImages1[$i];
        		elseif($productImages1[$i]->name == 'inside factory')
        			$productImages[6] = $productImages1[$i];
                        elseif($productImages1[$i]->name == 'preview')
        			$productImages[7] = $productImages1[$i];
        	}
        	ksort($productImages);        
        	return $productImages;


        }


    }

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
use Auth;
use App\Cart;
use App\Attributes;
use App\CartProductAttributes;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;
use App\CustomizedImages;


class CartController extends Controller {

    private $sessionId;

    public function __construct() {
        session_start();
        $this->sessionId = session_id();
    }

    public function delete($id) {
        $row = Cart::where('id', '=', $id)->delete();
        return redirect('cart/view');
    }

    public function update(Request $request) {
        $post = $request->all();

        foreach ($post['qty'] as $id => $qty) {
            $input['quantity'] = $qty;
            $affectedRows = Cart::where('id', '=', $id)->update($input);
        }

        return redirect('cart/view');
    }

    public function updateproductprice(Request $request) {
        
         $user_id = Auth::user()->id;
        $get = $request->all();
        $totalPrice = $get['price'];
        $response = array();
        foreach ($get['attributes'] as $data) {
            //d($data[0]);
            $check = strpos($data[0], '_option_');
            if ($check === false) {
                continue;
            } else {
                $value = explode('_option_', $data[0]);
                //d($value);
                $totalPrice+=$value[2];
            }
        }
        $response['total_price'] = $totalPrice;
        echo json_encode($response);
        //d($get['attributes']);
    }

    public function mycart() {
        
        $coupon = array();
        $validDiscount = Session::get('validDiscount');
        $products = Products::where("simpleProduct", 1)->get();
        $cart = Cart::getCart($this->sessionId);
        
//        print_r($cart); die;
        Session::put('cart', $cart);

        $countCart = array();

        if ($validDiscount == 1) {
            $coupon = Session::get('coupon');
        }

        return view('front.cart.view', compact('cart', 'products', 'coupon', 'countCart'));
    }

    public function addsimple(Request $request) {
        $products = Cart::where("product_id", $request->product_id)
                ->where('session_id', '=', $this->sessionId)
                ->limit(1)
                ->get();

        $data = $request->all();
        if (count($products) == 0) {
            $model = new Cart();
            $model->product_id = $data['product_id'];
            $model->session_id = $this->sessionId;
            $model->totalPrice = $data['total_price'];
            $model->quantity = $data['quantity'];
            $model->save();
        } else {
            $input['quantity'] = $products[0]->quantity + 1;
            $affectedRows = Cart::where('id', '=', $products[0]->id)->update($input);
        }
        return redirect($request->return);
    }

    public function add(Request $request) {
        
        $data = $request->all();

        print_r($data); die;
        $model = new Cart();
        $model->product_id = $data['product_id'];
        $model->session_id = $this->sessionId;
        $model->totalPrice = $data['total_price'];
        $model->quantity = $data['quantity'];
        $model->save();
        $cart_id = $model->id;

        //d($request->all(),1);

        if (!empty($data['attributes'])) {
            foreach ($data['attributes'] as $key => $valueData) {

                $check = strpos($valueData[0], '_option_');

                $model = new CartProductAttributes();
                $model->cart_id = $cart_id;
                $model->attribute_id = $key;
                if ($check === false) {
                    $model->value = $valueData[0];
                } else {
                    $value = explode('_option_', $valueData[0]);
                    $model->value_id = $value[1];
                    $model->value = $value[0];
                }
                $model->save();
            }
        }
    }

    public function addCustomizeProduct(Request $request) {

        $data = $request->all();
        $model = new Cart();
        $model->product_id = $data['product_id'];
        $model->session_id = $this->sessionId;
        $model->totalPrice = $data['total_price'];
        $model->quantity = $data['quantity'];
        
		$model->orb_request = $data['orb_request'];
		
        $png_url = "product-".time().".png";
        $large_path = public_path().'/uploads/customize_products/large/' . $png_url;
        $medium_path = public_path().'/uploads/customize_products/medium/' . $png_url;
         $small_path = public_path().'/uploads/customize_products/small/' . $png_url;

        Functions::base64_to_jpeg($data['image_data'],$large_path);
       
         $size = Config::get('params.customizedImageSize');
         $ratio = $size['originalHeight'] / $size['originalWidth'];
        
        Image::make($large_path)->resize($size['width_large'], $size['width_large'] * $ratio)->save($large_path);
        Image::make($large_path)->resize($size['width_medium'], $size['width_medium'] * $ratio)->save($medium_path);
        Image::make($large_path)->resize($size['width_small'], $size['width_small'] * $ratio)->save($small_path);
        $model->image_path = $png_url;

        $model->save();
        $cart_id = $model->id;

        //d($request->all(),1);

        if (!empty($data['attributes'])) {
            foreach ($data['attributes'] as $key => $valueData) {

                $check = strpos($valueData[0], '_option_');

                $model = new CartProductAttributes();
                $model->cart_id = $cart_id;
                $model->attribute_id = $key;
                if ($check === false) {
                    $model->value = $valueData[0];
                } else {
                    $value = explode('_option_', $valueData[0]);
                    $model->value_id = $value[1];
                    $model->value = $value[0];
                }
                $model->save();
            }
        }

        return redirect('/cart');

    }
    
    public function addCustomizeDesign(Request $request) {

        $data = $request->all();
        $model = new Cart();
        $model->product_id = $data['product_id'];
        $model->session_id = $this->sessionId;
        $model->totalPrice = $data['total_price'];
        $model->quantity = $data['quantity'];
        $model->image_path = $data['image_name'];
        $model->save();
        $cart_id = $model->id;

        if (!empty($data['attributes'])) {
            foreach ($data['attributes'] as $key => $valueData) {

                $check = strpos($valueData[0], '_option_');

                $model = new CartProductAttributes();
                $model->cart_id = $cart_id;
                $model->attribute_id = $key;
                if ($check === false) {
                    $model->value = $valueData[0];
                } else {
                    $value = explode('_option_', $valueData[0]);
                    $model->value_id = $value[1];
                    $model->value = $value[0];
                }
                $model->save();
            }
        }
        return redirect('/cart');
    }
    
    public function showTestPage(Request $request) {
        
        print_r($request->html_data); die;
        $row = Cart::where('id', '=', $id)->delete();
        return view('front.cart.view', compact('cart', 'products', 'coupon', 'countCart'));
    }
    
}

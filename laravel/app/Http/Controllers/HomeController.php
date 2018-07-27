<?php

namespace App\Http\Controllers;

use App\ItemPosts;
use DB;
use Auth;
use App\Categories;
use App\ProductsCategories;
use App\Products;
use App\Content;
use App\ProductsImages;
use App\UserTextureImages;
use App\Specialities;
use App\Attributesvalues;
use Illuminate\Http\Request;
use App\Functions\Functions;

class HomeController extends Controller {

    protected $categories = array();
    protected $layout = 'layouts.search';

    public function __construct() {
        $this->categories = 1;

    }

    public function index() {

        //////////////////////// FOR TESTING /////////////////
//         $content = Content::where('code', '=', 'order_confirmation')->get();
////         $content = "Testing";
//        $replaces['NAME'] = 'Order name';
//        $replaces['ID'] = '1';
//        $replaces['STATUS'] = "pending";
//        $template = Functions::setEmailTemplate($content, $replaces);
//        $mail = Functions::sendEmail('aims4aamir@yahoo.com', $template['subject'], $template['body']);
//        $mail = Functions::sendEmail('aims4aamir@gmail.com', $template['subject'], $template['body']);
//        $mail = Functions::sendEmail('amir@golpik.com', $template['subject'], $template['body']);
        
        /////////////////////////////////////////////
         $data['categories'] = Categories::where('status', 1)->limit(8)->get();
//         print_r($categories); die;
        $data['products'] = Products::orderBy('id', 'desc')->limit(8)->get();
        return view('front.index', $data);
    }
     public function demo($id) {
         
         if($id == 'rock')
            $a = $this->curlRequest('http://merchwiz.ma.liquifire.com/merchwiz?source=%20name%5BbaseImage0%5D,url%5Bfile:merchwiz/white_shoe.jpg%5D&source=%20name%5BpatternImage0%5D,url%5Bfile:merchwiz/rocks.jpg%5D&blank=height%5BbaseImage0.height%5D,name%5BpatternImage1%5D,width%5BbaseImage0.width%5D&tile=image%5BpatternImage0%5D&select=image%5BbaseImage0%5D&drape=grid%5Bfile:merchwiz/white_shoe.lgrd%5D,texture%5BpatternImage1%5D&sink&key=key%5B1496769880684%5D&key=key%5B1497262792041%5D');
            elseif ($id == 'tiger') 
                 $a = $this->curlRequest('http://merchwiz.ma.liquifire.com/merchwiz?source=%20name%5BbaseImage0%5D,url%5Bfile:merchwiz/white_shoe.jpg%5D&source=%20name%5BpatternImage0%5D,url%5Bfile:merchwiz/tiger.jpg%5D&blank=height%5BbaseImage0.height%5D,name%5BpatternImage1%5D,width%5BbaseImage0.width%5D&tile=image%5BpatternImage0%5D&select=image%5BbaseImage0%5D&drape=grid%5Bfile:merchwiz/white_shoe.lgrd%5D,texture%5BpatternImage1%5D&sink&key=key%5B1496769880684%5D&key=key%5B1497262792041%5D');
            elseif ($id == 'heart') 
                 $a = $this->curlRequest('http://merchwiz.ma.liquifire.com/merchwiz?source=%20name%5BbaseImage0%5D,url%5Bfile:merchwiz/white_shoe.jpg%5D&source=%20name%5BpatternImage0%5D,url%5Bfile:merchwiz/heart-test.jpg%5D&blank=height%5BbaseImage0.height%5D,name%5BpatternImage1%5D,width%5BbaseImage0.width%5D&tile=image%5BpatternImage0%5D&select=image%5BbaseImage0%5D&drape=grid%5Bfile:merchwiz/white_shoe.lgrd%5D,texture%5BpatternImage1%5D&sink&key=key%5B1496769880684%5D&key=key%5B1497262792041%5D');
            
         $large_path = public_path() . '/uploads/customize_products/test.jpg';
         
    $fp = fopen($large_path,'x');
    fwrite($fp, $a);
    fclose($fp);
         
         print_r($a); die;
//        $model = Content::where('code', 'stores')->first();
//        $model->body = Functions::setTemplate($model->body, array());
        return view('front.demo', compact('a'));
    }
    
     public function demoPage() {

        return view('front.demo');
    }
    
    private function curlRequest($url){
       // echo 'aaa'; die
        
        $curl = curl_init();
        header("Content-Type: image/jpeg");
        curl_setopt($curl, CURLOPT_URL, $url);
//        curl_setopt($curl, CURLOPT_HTTPHEADER, array('key: 3I8dKt55Nw7kO5rX9xLf27YgHi4370')); //setting custom header
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
//
        $result = curl_exec($curl);
        
        return $result;
        print_r($result); die;
//        curl_close($curl);
//
//
//        $xml = simplexml_load_string($result , null, LIBXML_NOCDATA); // parse xml
//        $xml = json_decode(json_encode($xml),true); /// convert object to array
//
//        return $xml;



        if(curl_exec($curl) === false)
        {
            echo 'Loading Error: ' . curl_error($curl);
        }
        else
        {
            $xml = simplexml_load_string($result , null, LIBXML_NOCDATA); // parse xml
            $xml = json_decode(json_encode($xml),true); /// convert object to array


            return $xml;
            //echo 'Operation completed without any errors';
        }

        curl_close($curl);

    }

    public function page() {

        $model = Content::where('code', 'home')->first();
        $model->body = Functions::setTemplate($model->body, array());
        return view('front.page', compact('model'));
    }

    public function aboutus() {
        $model = Content::where('code', 'aboutus')->first();
        $model->body = Functions::setTemplate($model->body, array());
        return view('front.page', compact('model'));
    }

    public function privacy() {
        $model = Content::where('code', 'privacy')->first();
        $model->body = Functions::setTemplate($model->body, array());
        return view('front.page', compact('model'));
    }

    public function terms() {
        $model = Content::where('code', 'terms')->first();
        $model->body = Functions::setTemplate($model->body, array());
        return view('front.page', compact('model'));
    }
    
    public function DesignGuidelines() {
        $model = Content::where('code', 'design-guidelines')->first();
        $model->body = Functions::setTemplate($model->body, array());
        return view('front.page', compact('model'));
    }
    
    public function termsConditions() {
        $model = Content::where('code', 'terms-conditions')->first();
        $model->body = Functions::setTemplate($model->body, array());
        return view('front.page', compact('model'));
    }
    
    public function sitemap() {
        $model = Content::where('code', 'sitemap')->first();
        $model->body = Functions::setTemplate($model->body, array());
        return view('front.page', compact('model'));
    }
    
        public function faq() {
        $model = Content::where('code', 'faq')->first();
        $model->body = Functions::setTemplate($model->body, array());
        return view('front.page', compact('model'));
    }
    
    public function bulkOrders() {
        $model = Content::where('code', 'bulk-orders')->first();
        $model->body = Functions::setTemplate($model->body, array());
        return view('front.page', compact('model'));
    }
    
    public function returns() {
        $model = Content::where('code', 'returns')->first();
        $model->body = Functions::setTemplate($model->body, array());
        return view('front.page', compact('model'));
    }

    public function getstarted() {
        $model = Content::where('code', 'get-started')->first();
        $model->body = Functions::setTemplate($model->body, array());
        return view('front.page', compact('model'));
    }
    
    public function shippingRates() {
        $model = Content::where('code', 'shipping-rates')->first();
        $model->body = Functions::setTemplate($model->body, array());
        return view('front.page', compact('model'));
    }

    public function contact() {
        $model = Content::where('code', 'contact')->first();
        $model->body = Functions::setTemplate($model->body, array());
        return view('front.page', compact('model'));
    }

    public function getproduct($id) {

         if (!isset(Auth::user()->id)) {
             return redirect('signup');
             
         }else{
             $user_id = Auth::user()->id;
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
        $productImages1 = Attributesvalues::getImagesAndColors($id);
        
        if(count($productImages1)>0)
          $productImages = $this->arrangeProductGallery($productImages1);
   
        
        $userTestures = UserTextureImages::where('user_id', '=', $user_id)->get();
        
       // $availabeInColors = Attributesvalues::getImagesAndColors($id);
        $relatedProducts = array();
        $savedDesign = array();
        //$relatedProducts=Products::where('category_id','=',$product->category_id)->limit(3)->get();
//        $category= Categories::find($product->category_id);
        $category= ProductsCategories::where('product_id', '=', $id)->get();
         $category= Categories::find($category[0]['category_id']);
              // print_r($availabeInColors); die;
        
//        $category = array();
        $attributes = DB::table('attributes as a')
                ->where('pa.product_id', '=', $id)
                ->leftJoin('products_attributes as pa', 'pa.attribute_id', '=', 'a.id')
                ->leftJoin('attributes_values as av', 'av.attribute_id', '=', 'a.id')
                ->select('a.id as attribute_id','a.required as attribute_required', 'a.name as name', 'a.type as type', DB::raw('group_concat(av.id) as value_id'), DB::raw('group_concat(av.name) as value_names'), DB::raw('group_concat(av.price) as value_price'))
                ->groupBy('a.id')
                ->orderBy('av.sortOrder', 'asc')
                ->get();
        
        return view('front.product_tool', compact('product', 'category', 'relatedProducts', 'attributes', 'productImages', 'availabeInColors', 'customize_items','savedDesign','userTestures'))->with('id', $id);
   
         } 
        
        }
        
         public function getproductDetail($id) {
             
         $categories = Categories::where('status', 1)->limit(8)->get();
        $user_id = Auth::user()->id;
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
        $productImages = Attributesvalues::getImagesAndColors($id);
        $userTestures = UserTextureImages::where('user_id', '=', $user_id)->get();
        
       // $availabeInColors = Attributesvalues::getImagesAndColors($id);
        
        $savedDesign = array();
        //$relatedProducts=Products::where('category_id','=',$product->category_id)->limit(3)->get();
//        $category= Categories::find($product->category_id);
        $category= ProductsCategories::where('product_id', '=', $id)->get();
         $category= Categories::find($category[0]['category_id']);
              // print_r($availabeInColors); die;
        
//        $category = array();
        $attributes = DB::table('attributes as a')
                ->where('pa.product_id', '=', $id)
                ->leftJoin('products_attributes as pa', 'pa.attribute_id', '=', 'a.id')
                ->leftJoin('attributes_values as av', 'av.attribute_id', '=', 'a.id')
                ->select('a.id as attribute_id','a.required as attribute_required', 'a.name as name', 'a.type as type', DB::raw('group_concat(av.id) as value_id'), DB::raw('group_concat(av.name) as value_names'), DB::raw('group_concat(av.price) as value_price'))
                ->groupBy('a.id')
                ->orderBy('av.sortOrder', 'asc')
                ->get();
        
        return view('front.product_detail', compact('product', 'categories','category', 'attributes', 'productImages', 'availabeInColors'))->with('id', $id);
   
        
        
        }

    public function sale() {
        $category = "";
        $products = Products::where('sale', '=', 1)->where('price', '>', 'salePrice')->get();
        return view('front.products', compact('products', 'category'));
    }

    public function products($id = 4) {
        
        $categories = Categories::where('status', 1)->get();
        $products = Products::getProducts(array());
        return view('front.products', compact('products', 'categories'));
    }
    
    public function productByCatId($id) {
        
        $categories = Categories::where('status', 1)->get();
        $products = Products::getProducts(array('category_id' => $id));
        
        return view('front.products', compact('products', 'categories','id'));
    }

    public function apparel($id = 1) {
        $category = Categories::find($id);
        $products = Products::getProducts(array('category_id' => $id));
        return view('front.products', compact('products', 'category'));
    }

    public function messagePost(Request $request) {
        $validation = array('name' => 'required|max:30',
            'email' => 'required|email|max:30',
            'captcha' => 'required|captcha',
            'message' => 'required|min:6|max:200');

        $messages = [
            'captcha' => 'The :attribute field is invalid.',
        ];

        $validator = Validator::make($request->all(), $validation, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $guestbook = new Guestbook;
        $guestbook->name = $request->name;
        $guestbook->email = $request->email;
        $guestbook->message = $request->message;
        $guestbook->save();
        return redirect('guestbook')->withInput();
    }
    
    public function productSearch() {

        $querystringArray = array();
            $q = $_GET['q'];
            $id = $_GET['cat_id'];
           
            $products = Products::getProductSearch($id,$q);
            $querystringArray = ['q' => $q];
       
        $categories = Categories::where('status', 1)->get();

        //$link = str_replace("category/?", "category?", $posts->appends($querystringArray)->render());
       
        return view('front.products', compact('products', 'categories','id','q'));
        //return view('front.blog.index', compact('posts', 'q', 'link'));
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
        
        //$productImages1 = array();
        
//        print_r(($productImages));
//         ksort($productImages);
//       // rsort($productImages);

//        
//        foreach($productImages as $img){
//            $productImages1[]=$img;
//        }
//        
//
//        print_r($productImages1); die;
        return $productImages;
        
        
    }

}

<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator,
    Input,
    Redirect;
use Auth;
use App\Shipping;
use App\Products;
use App\User;
use App\Orders;
use App\Address;
use Config;
use App\Countries;
use App\OrdersProducts;
use App\ProductsCategories;
use App\OrdersBundles;
use Session;
use Illuminate\Http\Request;
use Stripe;
use App\StripeCustomers;
use App\QuestOrders;
use App\Quest\Api;
use App\Content;
use App\Cart;
use App\Functions\Functions;

//use Cartalyst\Stripe\Laravel\Facades\Stripe;

class CheckoutController extends Controller {

    public $auth;
    private $sessionId;

    public function __construct() {

        $this->middleware('auth');
        session_start();
        $this->sessionId = session_id();
        //$this->paypal = new PayPal();
        // $this->_apiContext = $this->paypal->ApiContext(
        //        config('paypal.express.client_id'), config('paypal.express.secret'));
        // $this->_apiContext->setConfig(config('paypal.express.config'));
    }

    public function index() {
        
        $shippings = Shipping::all();

        $coupon = array();
        $validDiscount = Session::get('validDiscount');

        $userId = Auth::user()->id;
        $user = User::findOrFail($userId);
        $address = Address::where('user_id', '=', $userId)->first();
        $countries = Countries::lists('name', 'id');
        $cart = Cart::getCart($this->sessionId);
        // d($cart,1);
        if ($validDiscount == 1) {
            $coupon = Session::get('coupon');
        }
        return view('front.checkout.index', compact('countries', 'user', 'cart', 'address', 'coupon', 'shippings'));
    }

    public function order(Request $request) {
        //error_reporting(1);
        $userId = Auth::user()->id;
        $validationArray = array(
           'billingFirstName' => 'required|max:255',
            'billingLastName' => 'required|max:255',
            'billingEmail' => 'required|email',
            'billing_country_id' => 'required',
            'billingState' => 'required',
            'billingCity' => 'required',
            'billingAddress1' => 'required',
            'billingZip' => 'required',
            'billingPhone' => 'required',
            'shipping_id' => 'required',
            'ssn' => 'max:15',
            'cc' => 'required|max:16',
            'cvc' => 'required|max:4',
           
        );

        // d($request->all(),1);
        //$token = $request->stripeToken;

        $user = User::findOrFail($userId);
        $email = $user->email;
        $validator = Validator::make($request->all(), $validationArray);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors(), 'checkout');
        }
        $orderPrefix = Config::get('params.order_prefix');
        $stripe = Stripe::setApiKey(env('STRIPE_SECRET_SK1'));

        try {


            $token = $stripe->tokens()->create([
                'card' => [
                    'number' => $request->cc,
                    'exp_month' => $request->expMonth,
                    'exp_year' => $request->expYear,
                    'cvc' => $request->cvc,
                ],
            ]);
            
//            print_r($token); die;

            $stripeCustomerModel = StripeCustomers::where('user_id', $userId)->orderBy('id', 'desc')->first();
            
          //  print_r($stripeCustomerModel); die;
            
            if (isset($stripeCustomerModel->stripeCustomerId)) {
                $stripeCustomerId = $stripeCustomerModel->stripeCustomerId;
                $customer = Stripe::customers()->update($stripeCustomerId, array('source' => $token['id']));
            } else {
                $customer = Stripe::customers()->create([
                    'source' => $token['id'],
                    'email' => $email,
                    'metadata' => [
                        "First Name" => $user->firstName,
                        "Last Name" => $user->lastName
                ]]);

                $stripeCustomerId = $customer['id'];
                $insert_id = StripeCustomers::insertGetId(array('user_id' => $userId, 'stripeCustomerId' => $stripeCustomerId));

                $defaultSource = $customer['default_source'];
            }
            $defaultSource = $customer['default_source'];
        } catch (\Stripe\Error\Card $e) {
            return redirect()->back()->withErrors($e->getMessage(), 'checkout')->withInput();
        }

        
         $coupon = array();
        $validDiscount = Session::get('validDiscount');
        DB::beginTransaction();

        try {

//            $orderModel = new Orders();
//            $orderModel->firstName = $request->firstName;
//            $orderModel->lastName = $request->lastName;
//            $orderModel->dob = $request->year . "-" . $request->month . "-" . $request->date;
//            $orderModel->gender = $request->gender;
//            $orderModel->email = $request->email;
//            $orderModel->message = $request->message;
//            $orderModel->user_id = Auth::user()->id;
//            $orderModel->grandTotal = $request->grandTotal;
//            $orderModel->paymentType = 'stripe';
//            $orderModel->save();
//            $order_id = $orderModel->id;
//            $address1 = new Address();
//            $address1->country = $request->country_id;
//            $address1->city = $request->city;
//            $address1->state = $request->state;
//            $address1->address = $request->address1;
//            $address1->address2 = $request->address2;
//            $address1->order_id = $order_id;
//            $address1->user_id = Auth::user()->id;
//            $address1->zip = $request->zip;
//            $address1->phone = $request->phone;
//            $address1->addressType = 'patient';
//            $address1->save();
//
//            $quest['PATIENT_LASTNAME'] = $request->lastName;
//            $quest['PATIENT_FIRSTNAME'] = $request->firstName;
//            $quest['PID'] = 'P' . $order_id;
//            $quest['DOB'] = $request->year . sprintf("%02d", $request->month) . sprintf("%02d", $request->date);
//            $quest['GENDER'] = strtoupper($request->gender);
//            $quest['PHONE'] = strtoupper($request->phone);
//            $quest['SSN'] = $request->ssn;
//            $quest['MESSAGE_CODE'] = 'ORM^O01';
//            $quest['MESSAGE_CONTROL_ID'] = $orderPrefix . $order_id;
//
//
//            $quest['ORDER_CONTROL'] = 'NW';
//            $quest['ORDER_NUMBER'] = $order_id;
//            $cart = Session::get('cart');
            
            
             $orderModel = new Orders();
            $orderModel->billingFirstName = $request->billingFirstName;
            $orderModel->billingLastName = $request->billingLastName;
            $orderModel->email = $request->billingEmail;

            $orderModel->shippingFirstName = $request->billingFirstName;
            $orderModel->shippingLastName = $request->billingLastName;
            $orderModel->message = $request->message;
            $orderModel->shipping_id = $request->shipping_id;
 

            if ($request->isShippingDifferent == 1) {
                $orderModel->shippingFirstName = $request->shippingFirstName;
                $orderModel->shippingLastName = $request->shippingLastName;
            }

            $orderModel->user_id = Auth::user()->id;
            $shipping = Shipping::where('id', $request->shipping_id)->get();

            //d($shipping,1);
            $discount = 0;
            if ($validDiscount == 1) {
                $coupon = Session::get('coupon');
                $orderModel->grandTotal = $request->grandTotal + $shipping[0]->price - $coupon['discount'];
                $discount = $coupon['discount'];
            } else {
                $orderModel->grandTotal = $request->grandTotal + $shipping[0]->price;
            }
            $orderModel->paymentType = 'stripe';
            $q = $orderModel->save();

            $order_id = $orderModel->id;

            if ($validDiscount == 1) {
                $discountModel = new OrdersDiscounts();
                $discountModel->order_id = $orderModel->id;
                $discountModel->customer_id = Auth::user()->id;
                $discountModel->coupon_id = $coupon['coupons']->id;
                $discountModel->discount = $coupon['discount'];
                $discountModel->save();
            }

            $address1 = new Address();
            $address1->country = $request->billing_country_id;
            $address1->city = $request->billingCity;
            $address1->state = $request->billingState;
            $address1->address = $request->billingAddress1;
            $address1->address2 = $request->billingAddress2;
            $address1->order_id = $order_id;
            $address1->user_id = Auth::user()->id;
            $address1->zip = $request->billingZip;
            $address1->phone = $request->billingPhone;
            $address1->addressType = 'billing';
            $address1->save();

            $addressShiiping = new Address();
            $addressShiiping->addressType = 'shipping';
            if ($request->isShippingDifferent == 1) {
                $addressShiiping->country = $request->billing_country_id;
                $addressShiiping->city = $request->billingCity;
                $addressShiiping->state = $request->billingState;
                $addressShiiping->address = $request->billingAddress1;
                $addressShiiping->address2 = $request->billingAddress2;
                $addressShiiping->order_id = $order_id;
                $addressShiiping->user_id = Auth::user()->id;
                $addressShiiping->zip = $request->billingZip;
                $addressShiiping->phone = $request->billingPhone;
            } else {
                $addressShiiping->country = $request->shipping_country_id;
                $addressShiiping->city = $request->shippingCity;
                $addressShiiping->state = $request->shippingState;
                $addressShiiping->address = $request->shippingAddress1;
                $addressShiiping->address2 = $request->shippingAddress2;
                $addressShiiping->order_id = $order_id;
                $addressShiiping->user_id = Auth::user()->id;
                $addressShiiping->zip = $request->shippingZip;
                $addressShiiping->phone = $request->shippingPhone;
            }
            //d($addressShiiping,1);
            $addressShiiping->save();
            
            
            
            $cart = Session::get('cart');

            
             $sum = 0;
            $quantity = 0;
            $tests = array();
            $testCount = 1;
            
            echo '<pre>'; print_r($cart); echo '</pre>';
            foreach ($cart as $product) {

                $opModel = new OrdersProducts();
                $opModel->product_id = $product->product_id;
                $opModel->price = $product->total_price;
                $opModel->order_id = $order_id;
                $opModel->quantity = $product->quantity;
                $opModel->image_path = $product->cart_customized_image;
                $opModel->save();

                $productModel = Products::find($product->product_id);
                $sum+=$product->total_price * $product->quantity;


//                
            }
             $total_price = $sum - $discount;
            
            $charge = Stripe::charges()->create([
                'amount' => $total_price,
                'currency' => 'usd',
                'customer' => $stripeCustomerId,
                'source' => $defaultSource,
                'metadata' => [
                    "Order ID" => $orderPrefix . $order_id,
                    "Link" => url('order/' . $order_id)
                ],
                'capture' => true]);

//
//            $questOrder = Api::submitOrder($quest, $order_id);
//            QuestOrders::insertGetId(array('order_id' => $order_id, 'response' => $questOrder));
//            Session::put('order_id', $order_id);
            
             Session::put('order_id', $order_id);
                DB::commit();
                Session::forget('coupon');
                Session::forget('validDiscount');
            
            // return redirect('checkout/success/' . $order_id);
        } catch (Exception $e) {
            DB::rollBack();
            return redirect('checkout/fail');
        }
    }


    public function fail() {
        return view('front.checkout.fail');
    }
    
    
    public function success() {
        $order_id = Session::get('order_id');
        $orders = Orders::getOrderDetailByPk($order_id);
        
        $affectedRows = Orders::where('id', '=', $order_id)->update(array('paymentStatus' => 'success'));
        Cart::where('session_id', '=', $this->sessionId)->delete();
        $content = Content::where('code', '=', 'order_confirmation')->get();
        $replaces['NAME'] = $orders->name;
        $replaces['ID'] = Config("params.order_prefix").$order_id;
        $replaces['STATUS'] = "pending";
        $template = Functions::setEmailTemplate($content, $replaces);
        $mail = Functions::sendEmail($orders->email, $template['subject'], $template['body']);
        $content = Content::where('code', '=', 'check_success')->firstOrFail();
        return view('front.payments.check.success', compact('content','order_id'));
    }

 

}

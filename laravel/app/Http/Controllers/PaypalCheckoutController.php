<?php

namespace App\Http\Controllers;

use App\OrderProductAttributes;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator,
    Input,
    Redirect;
use Auth;
use App\Paypal;
use App\Products;
use App\User;
use App\Orders;
use App\Address;
use Config;
use App\Countries;
use App\OrdersProducts;
use App\ProductsCategories;
use Session;
use Illuminate\Http\Request;
use Stripe;
use App\StripeCustomers;
use App\Content;
use App\Cart;
use App\Shipping;
use App\Functions\Functions;


use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class CheckoutController extends Controller {

    public $auth;
    private $_apiContext;
    private $paypal;

    public function __construct() {
        $this->middleware('auth');
        session_start();
        $this->sessionId = session_id();

//        $paypal_conf = Config::get('paypal');
//        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
//        $this->_api_context->setConfig($paypal_conf['settings']);
        
        //print_r(ApiContext); die;
        
         $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(config('paypal.express.client_id'), config('paypal.express.secret')));
        $this->_api_context->setConfig(config('paypal.express.config'));

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
        );

        if ($request->isShippingDifferent == 1) {
            $validationShippingArray = array(
                'shippingFirstName' => 'required|max:255',
                'shippingLastName' => 'required|max:255',
                'shipping_country_id' => 'required',
                'shippingState' => 'required',
                'shippingCity' => 'required',
                'shippingAddress1' => 'required',
                'shippingPhone' => 'required',
                'shippingZip' => 'required',
            );
            $validationArray = array_merge($validationArray, $validationShippingArray);
        }

        $validator = Validator::make($request->all(), $validationArray);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors(), 'checkout');
        }

        $coupon = array();
        $validDiscount = Session::get('validDiscount');

        DB::beginTransaction();
        
       
        try {

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
            $orderModel->paymentType = 'paypal';
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
            //$ccModel=new CreditCard();
            //$ccModel->name=$request->name;
            //$ccModel->cardNumber=$request->cardNumber;
            //$ccModel->cardExpiry=$request->expiryMonth.'/'.$request->expiryYear;
            //$ccModel->cardCVC=$request->cardCVC;
            //$ccModel->order_id=$order_id;
            //$ccModel->save();

            $cart = Session::get('cart');

            $i = 1;
            $sum = 0;
            $quantity = 0;
            
           
            foreach ($cart as $product) {

                $opModel = new OrdersProducts();
                $opModel->product_id = $product->product_id;
                $opModel->price = $product->total_price;
                $opModel->order_id = $order_id;
                $opModel->quantity = $product->quantity;
                 $opModel->image_path = $product->cart_customized_image;
                $opModel->save();

                $item = new Item();
                $item->setName($product->product_name)
                        ->setQuantity($product->quantity)
                        ->setPrice($product->total_price)
                        ->setCurrency(config('params.currency_default'));
                $description = "";
                $sum+=$product->total_price * $product->quantity;
                $quantity+=$product->quantity;

                $attribute_ids = explode(',', $product->attribute_id);
                $attributes = explode(',', $product->attribute);
                $values = explode(',', $product->value);
                while (list($key, $attribute) = each($attributes) and list($vkey, $value) = each($values) and list($akey, $attribute_id) = each($attribute_ids)) {
                    $opaModel = new OrderProductAttributes();
                    $opaModel->attribute_id = $attribute_id;
                    $opaModel->attribute = $attribute;
                    $opaModel->value = $value;
                    $opaModel->orders_prodrocts_id = $opModel->id;
                    $opaModel->save();
                    $description.=$opaModel->attribute . ": " . $opaModel->value . "\n";
                }
                $item->setDescription($description);
                $items[] = $item;
                $i++;
            }


            if ($validDiscount == 1) {
                $d = $coupon['discount'] * -1;
                $item = new Item();
                $item->setName("Discount")
                        ->setQuantity(1)
                        ->setPrice($d)
                        ->setCurrency(config('params.currency_default'));
                $item->setDescription($coupon['coupons']->description);
                $items[] = $item;
            }

            $item_list = new ItemList();
            $item_list->setItems($items);

            $payer = new Payer();
            $payer->setPaymentMethod('paypal');

            $details = new Details();
            $details->setShipping($shipping[0]->price)
                    ->setTax(0)
                    ->setSubtotal($sum - $discount);
            // d($details,1);   
            $amount = new Amount();
            $amount->setCurrency(config('params.currency_default'));
            //
            $amount->setTotal($sum - $discount + $shipping[0]->price)->setDetails($details);

            // $amount->setShipping('0.03');

            $transaction = new Transaction();
            $transaction->setAmount($amount)->setInvoiceNumber($order_id)
                    ->setDescription(config('params.site_name') . ' Order');
            $transaction->setItemList($item_list);
            //d($transaction,1);

//
            $redirectUrls = new RedirectUrls();
            $redirectUrls->setReturnUrl(action(config('paypal.express.success')));
            $redirectUrls->setCancelUrl(action(config('paypal.express.cancel')));

            $payment = new Payment();
            $payment->setIntent('sale');
            $payment->setPayer($payer);
            $payment->setRedirectUrls($redirectUrls);
            $payment->setTransactions(array($transaction));

            try {
                 
                $response = $payment->create($this->_api_context);
                $redirectUrl = $response->links[1]->href;
                Session::put('order_id', $order_id);
                DB::commit();
                Session::forget('coupon');
                Session::forget('validDiscount');
                return Redirect::to($redirectUrl);
            } catch (\PayPal\Exception\PayPalConnectionException $ex) {
                echo $ex->getData();
                die('here');
            }
            return redirect('checkout/success/' . $order_id);
        } catch (Exception $e) {
            DB::rollBack();
            return redirect('checkout/fail');
        }
    }

    public function success($id) {
        return view('front.checkout.success')->with('id', $id);
    }

}
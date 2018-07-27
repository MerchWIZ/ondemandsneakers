<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Validator;
use App\User;
use App\Address;
use App\Products;
use App\Cart;
use App\AmbassadorsSpecialities;
use App\Functions\Functions;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class SignupController extends Controller {

    use AuthenticatesAndRegistersUsers;

    protected $loginPath = 'signup';

    public function __construct(Guard $auth, Registrar $registrar) {
        $this->auth = $auth;
        $this->registrar = $registrar;
        $this->middleware('guest', ['except' => 'success']);
    }

    public function login() {
        return view('front.customers.login');
    }

    public function register() {
        $pathInfo = (explode("/", $_SERVER['REQUEST_URI']));
        $view = 'front.customers.register_' . end($pathInfo);
        
        //  $specialities = \App\Specialities::get();
//        return view($view, compact('specialities'));
        return view($view);
    }

    public function signup() {
        return view('front.customers.signup');
    }

    public function forgot_password() {
        return view('front.customers.forgot');
    }

    public function postLoginPopup(Request $request) {

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $response['error'] = 0;
        $response['login'] = 0;
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['error'] = 1;
            $response['errors'] = $errors;
        } else {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $response['user_id'] = Auth::user()->id;
                $response['user'] = Auth::user();
                $response['login'] = 1;
            } else {
                $response['error'] = 1;
                $response['errors']['login'] = $this->getFailedLoginMessage();
            }
        }
        echo json_encode($response);
    }

    public function postLogin(Request $request) {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if ($this->auth->attempt($credentials, $request->has('remember'))) {
            session_start();

            $cart = Cart::countCart(session_id());
            if ($cart > 0) {
                $cart = Cart::where('session_id', '=', session_id())->where('type', '=', 'simple')->get();
                foreach ($cart as $product) {
                    $model = Products::find($product->product_id);
                    $price = Functions::getPrice(Auth::user(), $model);
                    Cart::where('id', $product->id)->update(array('totalPrice' => $price));
                }
                //d($cart,1);
                return redirect('cart/view');
                die;
            }
            return redirect()->intended($this->redirectPath());
        }

        return redirect($this->loginPath())
                        ->withInput($request->only('email', 'remember'))
                        ->withErrors([
                            'email' => $this->getFailedLoginMessage(),
        ]);
    }

    public function store(Request $request) {
        $validation = array(
            'firstName' => 'required|max:20',
            'lastName' => 'required|max:20',
            'email' => 'required|email|max:50|unique:users',
            'password' => 'required|confirmed|min:6',
            'gender' => 'required',
            'state' => 'required',
            'city' => 'required|max:25',
            'zip' => 'required|max:15',
            'address' => 'required|max:100',
            'address2' => 'max:100',
//            'goals' => 'max:50',
//            'medicalConcerns' => 'max:50',
//            'weight' => 'numeric',
//            'height' => 'numeric',
            'phone' => 'required|max:16',
                //'g-recaptcha-response' => 'required|recaptcha',
        );
        if ($request->role_id == '3') {
            $validation['specialities'] = 'required';
        }


        if ($request->isCompetitor == 'on') {
            $validation['federation'] = 'max:50';
            $request->isCompetitor = 1;
        } else {
            $request->isCompetitor = 0;
            $request->federation = '';
        }
//        $messages = [
//            "recaptcha" => 'The :attribute field is not correct.',
//        ];
        $validator = Validator::make($request->all(), $validation);

        if ($validator->fails()) {
            return redirect()->back()->withInput($request->all())->withErrors($validator->errors(), 'register');
        }

        $user = new User;
        $user->firstName = $request->firstName;
        $user->middleName = $request->middleName;
        $user->lastName = $request->lastName;
        $user->state = $request->state;
        $user->gender = $request->gender;
//        $user->dob = $request->year . "-" . $request->month . "-" . $request->date;
        $user->email = $request->email;
//        $user->medicalConcerns = $request->medicalConcerns;
//        $user->isCompetitor = $request->isCompetitor;
        $user->role_id = '4';
        $user->password = bcrypt($request->password);
//        $user->medicalConcerns = $request->medicalConcerns;
//        $user->federation = $request->federation;
//        $user->height = $request->height;
//        $user->weight = $request->weight;
//        $user->goals = $request->goals;
        $user->save();

        $address = new Address;
        $address->user_id = $user->id;
        $address->phone = $request->phone;
        $address->country = 230;
        $address->state = $request->state;
        $address->city = $request->city;
        $address->address = $request->address;
        $address->address2 = $request->address2;
        $address->zip = $request->zip;
        $address->save();
        $credentials = $request->only('email', 'password');

//        if ($request->role_id == '3') {
//            $ambassadors_speciality = new AmbassadorsSpecialities;
//            $ambassadors_speciality->ambassador_id = $user->id;
//            $ambassadors_speciality->speciality_id = $request->specialities;
//            $ambassadors_speciality->save();
//            $credentials = $request->only('email', 'password');
//        }


        if (Auth::attempt($credentials, 1)) {
            session_start();
            $cart = Cart::where('session_id', '=', session_id())->count();
            // d($cart,1);
            if ($cart > 0) {
                return redirect('cart');
                die;
            }
            
          
            return redirect('register/success/' . $user->id);
        }
        return redirect('/profile');
    }

    public function success($id) {
        
       
        $this->middleware('auth');
        $user = User::findOrFail($id);
        $data['user'] = $user;
        return view('front.customers.register_success', $data);
    }

    protected function sendFailedLoginResponse(Request $request) {
        if ($request->ajax()) {
            return response()->json([
                        'error' => Lang::get('auth.failed')
                            ], 401);
        }

        return redirect()->back()
                        ->withInput($request->only($this->username(), 'remember'))
                        ->withErrors([
                            $this->username() => Lang::get('auth.failed'),
        ]);
    }

}

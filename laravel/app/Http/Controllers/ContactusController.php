<?php 

namespace App\Http\Controllers;

use App\Http\Requests;

use App\Http\Controllers\Controller;
use Validator, Input, Redirect; 
use App\Contactus;
use Session;
use App\Content;
use Illuminate\Http\Request;
use App\Functions\Functions;

class ContactusController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	// use CaptchaTrait;

	public function __construct()
	{
		
	}

	// Contact-us
	public function index()
	{		
            $model = Content::where('code', 'contact')->first();
        $model->body = Functions::setTemplate($model->body, array());
        
//        print_r($model); die;
//        return view('front.page', compact('model'));
		return view('front.contact-us',compact('model'));
	}
	
	public function store(Request $request)
	{		
		$validation = array(
			'f_name' => 'required|max:30',
			'l_name' => 'required|max:30',
			'email' => 'required|email|max:30',
			'phone_number' => 'required|max:30',
            'message' => 'required|min:6|max:200',
            'g-recaptcha-response'  => 'required',
            'captcha'               => 'required|min:1'
            );		
		 $messages = [
		 'g-recaptcha-response.required' => 'Captcha is required',
         'captcha.min'           => 'Wrong captcha, please try again.'
      ];
		
		
		 $validator = Validator::make($request->all(),$validation, $messages);
		//$validator = Validator::make($request->all(),$validation);
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator->errors())->withInput();
		}
		
		$contactus = new Contactus;
		$contactus->f_name = $request->f_name;
		$contactus->l_name = $request->l_name;
		$contactus->email = $request->email;
		$contactus->phone_number = $request->phone_number;
		$contactus->message = $request->message;
		$contactus->save();
		
		$request->session()->flash('alert-success', 'Successfully Submitted, Thanks for contacting us!');
        return redirect('contact-us');
        
	}
	
	
	

	
	
}

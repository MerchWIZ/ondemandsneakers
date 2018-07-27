<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use Validator, Input, Redirect;
use Illuminate\Http\Request;
use App\Newsletter;

class NewsletterController extends Controller {

	private $sessionId;

    public function __construct() {
        session_start();
        $this->sessionId = session_id();
        // $this->middleware('auth');
    }


    public function store(Request $request) 
    {
		$validator = Validator::make($request->all(), [
		'name' => 'required|max:150',
		'email' => 'required|email|max:255|unique:newsletter',
		]);

        // $response=array();

        if ($validator->fails()) 
        {
            $response = $validator->errors();
            // return redirect()->back()->withErrors($validator->errors())->withInput();
            //  d($validator,1);
        }
        else 
        {
			$data = $request->all();
			$model = new Newsletter();
			$model->name = $data['name'];
			$model->email = $data['email'];
			$model->save();

            $response = 1;
			/// return redirect('/');
        }

         echo json_encode($response);
    }

}

?>
<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator,
    Input,
    Redirect;
use App\User;
use App\Countries;
use App\States;
use App\Address;
use Auth;
use Session;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use App\Functions\Functions;
use Intervention\Image\Facades\Image as Image;

class CalculatorController extends Controller {
    
    use AuthenticatesAndRegistersUsers;

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        //$user_id = Auth::user()->id;
        //$user = User::findOrFail($user_id);


        return view('front.calculator.index');
    }
    
    public function detail() {

        return view('front.calculator.detail');
    }
    
    
}


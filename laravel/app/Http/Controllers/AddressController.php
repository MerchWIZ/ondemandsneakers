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

class AddressController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    use AuthenticatesAndRegistersUsers;

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {

        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        $states = States::get();
        $address = Address::where('user_id', '=', $user_id)->first();
        $countries = Countries::get();

        return view('front.address.index',compact('user', 'states', 'countries', 'address'))->with('user_id', $user_id);
    }

    public function edit() {

        $user_id = Auth::user()->id;
        $states = States::get();
        $address = Address::where('user_id', '=', $user_id)->first();
        $countries = Countries::get();

        return view('front.address.edit', compact('states', 'countries', 'address'))->with('user_id', $user_id);
    }
       public function update(Request $request) {

        $user_id = Auth::user()->id;
        $rules = array(
            'country' => 'required',
            'city' => 'required',
            'address' => 'required|max:100',
            'address2' => 'max:100',
            'zip' => 'required|min:4',
        );

        $validator = Validator::make($request->all(), $rules);
        // $checkEmail=User::where('email','!=',$user->email)->where('email',$request->email)->count();

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator, 'register')->withInput();
        } else {

            $data = $request->all();
            array_forget($data, '_token');
            $address['state'] = $request->state;
            $address['city'] = $request->city;
            $address['country'] = $request->country;
            $address['address'] = $request->address;
            $address['address2'] = $request->address2;
            $address['zip'] = $request->zip;

           // $affectedRows = User::where('id', '=', $user_id)->update($input);
            $affectedRows = Address::where('id', '=', $request->address_id)->update($address);
            Session::flash('success', 'Successfully Updated.');
            return redirect()->back();
        }
    }

}

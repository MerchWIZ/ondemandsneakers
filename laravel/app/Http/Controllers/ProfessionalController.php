<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Validator,
    Redirect;
use App\User;
use Auth;
use DB;
use Session;
use App\AmbassadorsSpecialities;
use App\Specialities;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class ProfessionalController extends Controller {

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
        $data['user'] = User::findOrFail($user_id);
        $data['speciality'] = DB::table('ambassadors_specialities')
            ->join('specialities','ambassadors_specialities.speciality_id','=','specialities.id')
            ->select('specialities.title')
            ->where('ambassadors_specialities.ambassador_id','=',$user_id)
            ->first();
                
        return view('front.professional.index',$data)->with('user_id', $user_id);
    }

    public function edit() {

        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        if (isset($user->dob)) {
            list($year, $month, $date) = explode('-', $user->dob);
            $user->date = $date;
            $user->month = $month;
            $user->year = $year;
        }
        
        $speciality_id = DB::table('ambassadors_specialities')
            ->join('specialities','ambassadors_specialities.speciality_id','=','specialities.id')
            ->select('specialities.id')
            ->where('ambassadors_specialities.ambassador_id','=',$user_id)
            ->first();
        
        //d($speciality_id,1);
        $speciality = Specialities::get();
        return view('front.professional.edit', compact('user','speciality','speciality_id','date','month','year'))->with('user_id', $user_id);
    }

    public function update(Request $request) {

        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        $rules = array(
            'goals' => 'max:50',
            'medicalConcerns' => 'max:50',
            'weight' => 'numeric',
            'height' => 'numeric'
        );

        if ($request->isCompetitor == 'on') {
            $rules['federation'] = 'max:50';
            $request->isCompetitor = 1;
        } else {
            $request->isCompetitor = 0;
            $request->federation = '';
        }

        $validator = Validator::make($request->all(), $rules);
        // $checkEmail=User::where('email','!=',$user->email)->where('email',$request->email)->count();

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator, 'register')->withInput();
        } else {
            $user = User::findOrFail($user_id);
            $data = $request->all();
            $input['about'] = $request->about;
            $input['goals'] = $request->goals;
            $input['experience'] = $request->experience;
            $input['dob'] = $request->year . "-" . $request->month . "-" . $request->date;

            $input['medicalConcerns'] = $request->medicalConcerns;
            $input['height'] = $request->height;
            $input['weight'] = $request->weight;
            
            
            $input['isCompetitor'] = $request->isCompetitor;
            $input['federation'] = $request->federation;
            $ambassadors_speciality['speciality_id'] = $request->specialities;
            array_forget($data, '_token');
            $affectedRows = User::where('id', '=', $user_id)->update($input);
            $affectedRows = AmbassadorsSpecialities::where('ambassador_id', '=', $user_id)->update($ambassadors_speciality);
            Session::flash('success', 'Successfully Updated.');
            return redirect()->back();
        }
    }

}

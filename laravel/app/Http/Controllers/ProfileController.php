<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use App\Countries;
use App\States;
use App\Ambassadors;
use App\AmbassadorsSubscriptions;
use App\Address;
use DB;
use App\Shows;
use App\MealPlans;
use App\WorkoutPlans;
use App\Results;
use App\Messages;
use Auth;
use Session;
use App\Certifications;
use App\Specialities;
use App\Functions\Functions;
use Illuminate\Http\Request;

class ProfileController extends Controller { 
    /**
 * Display a listing of the resource.
 *
 * @return Response
 */

    public function __construct() {
        $this->middleware('auth');
    }

    public function index($id) {
        $auth_id = Auth::user()->id;
        $user_id = $id;
        $data['user'] = User::findOrFail($user_id);
        //d($data['user'],1);
        $data['shows'] = Shows::where('user_id', '=', $user_id)->get();
        $data['age'] = Functions::getAge($data['user']['dob']);

        if (isset($user->dob)) {
            list($year, $month, $date) = explode('-', $user->dob);
            $user->date = $date;
            $user->month = $month;
            $user->year = $year;
        }
        $exists = Ambassadors::where('user_id', '=', $id)->exists();

        $role = \App\Role::find($data['user']['role_id']);
        $data['role'] = $role->role;

        if ($exists) {
            $data['rate'] = Ambassadors::where('user_id', $id)->first();
        } else {
            $data['rate'] = NULL;
        }
        if (AmbassadorsSubscriptions::where('athlete_id', '=', $auth_id)->exists()) {
            $data['subscribed'] = AmbassadorsSubscriptions::where([
                        'athlete_id' => $auth_id,
                        'subscriptionStatus' => 1,
                    ])->first();
        } elseif (AmbassadorsSubscriptions::where('ambassador_id', '=', $auth_id)->exists()) {
            $data['subscribed'] = AmbassadorsSubscriptions::where([
                        'athlete_id' => $id,
                        'ambassador_id' => $auth_id,
                        'subscriptionStatus' => 1,
                    ])->first();
        } else {
            $data['subscribed'] = NULL;
        }
        $data['shows'] = Shows::where('user_id', '=', $user_id)
                ->orderBy('date', 'desc')
                ->first();
        //d($data['shows'],1);

        $data['states'] = States::get();
        $data['address'] = Address::where('user_id', '=', $user_id)->first();
        $data['countries'] = Countries::get();
        $data['speciality'] = DB::table('ambassadors_specialities')
                ->join('specialities', 'ambassadors_specialities.speciality_id', '=', 'specialities.id')
                ->select('specialities.id')
                ->where('ambassadors_specialities.ambassador_id', '=', $user_id)
                ->first();
        //d($data['speciality'],1);
        if (isset($data['speciality'])) {
            $data['specialities'] = Specialities::where('id', $data['speciality']->id)->first();
        } else {
            $data['specialities'] = NULL;
        }

        $data['certifications'] = Certifications::where('user_id', '=', $user_id)->first();
        //d($data['certifications'],1);
        $data['results'] = Results::
                where('user_id', '=', $user_id)
                ->orderBy('date', 'desc')
                ->get();
        $data['messages'] = Messages::get();
        //d($results,1);
        $data['athleteWp'] = WorkoutPlans::join('athlete_wp', 'athlete_wp.wp_id', '=', 'workout_plans.id')
                ->select('workout_plans.*', 'athlete_wp.athlete_id as a_wid')
                ->where([
                    'athlete_wp.athlete_id' => $user_id,
                    'workout_plans.deleted' => 0,
                ])
                ->orderBy('athlete_wp.id', 'desc')
                ->first();
        $data['athleteMp']= MealPlans::join('athlete_mp', 'athlete_mp.mp_id', '=', 'meal_plans.id')
                        ->select('meal_plans.*', 'athlete_mp.athlete_id as a_mid')
                        ->where([
                            'meal_plans.deleted' => 0,
                            'athlete_mp.athlete_id' => $user_id,
                        ])
                        ->orderBy('athlete_mp.id', 'desc')
                        ->first();

        return view('front.profile.index', $data)->with('user_id', $user_id);
    }

    public function store(Request $request) {
        $subscribed = new AmbassadorsSubscriptions;
        $subscribed->ambassador_id = $request->ambassador_id;
        $subscribed->athlete_id = $request->athlete_id;
        $subscribed->subscriptionRate = $request->subscriptionRate;
        $subscribed->subscriptionComission = $request->subscriptionComission;
        $subscribed->subscriptionDate = date('Y-m-d H:i:s');
        $subscribed->save();
        Session::flash('success', 'Successfully Subscribed.');
        return back();
    }

    public function saveReview(Request $request) {
        //  d($_POST,1);
        $messages = new Messages;
        $messages->ambassador_id = $request->ambassador_id;
        $messages->athlete_id = $request->athlete_id;
        $messages->message = $request->message;
        $messages->result_id = $request->result_id;
        $messages->type = $request->type;
        $messages->save();
        return back();
    }

    public function update($id) {
        AmbassadorsSubscriptions::where('id', '=', $id)->update([
            'subscriptionStatus' => '2',
        ]);
        Session::flash('success', 'Successfully Unsubscribed.');
        return back();
    }

}

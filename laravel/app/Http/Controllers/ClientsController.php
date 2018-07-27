<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\Results;
use App\Shows;
use App\MealPlans;
use App\WorkoutPlans;
use App\Certifications;
use App\User;
use App\Messages;
use Illuminate\Http\Request;
use App\Orders;

class ClientsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        if (Auth::user()->role->role == 'admin') {

            $model = User::where('role_id', '!=', 1)
                    ->leftJoin('roles as r', 'r.id', '=', 'users.role_id')
                    ->select('users.id', 'users.firstName', 'users.lastName', 'users.email', 'users.role_id', 'users.created_at', 'r.role')
                    ->get();
            return view('admin.clients', compact('model'));
        } else {
            return redirect('home');
        }
    }

    public function userDetail(Request $request) {
        $userId = $request->id;
        //d($userId,1);
        if ($userId > 0) {
            if (Auth::user()->role->role == 'admin') {
                $data = User::join('address', 'address.user_id', '=', 'users.id')
                                ->select('users.*', 'address.phone', 'address.country', 'address.state', 'address.city', 'address.address', 'address.zip', 'address.created_at', 'address.addressType', 'address.address2', 'address.mobile')
                                ->where('users.id', '=', $userId)
                                ->whereNull('address.order_id')->get();

                $orders = Orders::where('orders.user_id', '=', $userId)
                        ->orderBy('orders.id', 'desc')
                        ->get();
                $subscriptions = DB::table('ambassadors_subscriptions')
                        ->join('users as u', 'u.id', '=', 'ambassadors_subscriptions.ambassador_id')
                        ->join('users as v', 'v.id', '=', 'ambassadors_subscriptions.athlete_id')
                        ->select('ambassadors_subscriptions.*', 'u.firstName as ambassador', 'v.firstName as athlete', 'u.role_id as amb_role', 'v.role_id as ath_role')
                        ->where('u.status', 1)
                        ->where('v.status', 1)
                        ->where('ambassador_id', '=', $userId)
                        ->orWhere('athlete_id', '=', $userId)
                        ->orderBy('id', 'desc')
                        ->get();
                $results = Results::where('user_id', '=', $userId)
                        ->orderBy('date', 'desc')
                        ->get();
                //     d($results, 1);
                $shows = Shows::where('user_id', '=', $userId)
                        ->orderBy('date', 'desc')
                        ->first();
                $athleteWp = WorkoutPlans::join('athlete_wp', 'athlete_wp.wp_id', '=', 'workout_plans.id')
                        ->select('workout_plans.*', 'athlete_wp.athlete_id as a_wid')
                        ->where([
                            'athlete_wp.athlete_id' => $userId,
                            'workout_plans.deleted' => 0,
                        ])
                        ->orderBy('athlete_wp.id', 'desc')
                        ->first();
                $athleteMp = MealPlans::join('athlete_mp', 'athlete_mp.mp_id', '=', 'meal_plans.id')
                        ->select('meal_plans.*', 'athlete_mp.athlete_id as a_mid')
                        ->where([
                            'meal_plans.deleted' => 0,
                            'athlete_mp.athlete_id' => $userId,
                        ])
                        ->orderBy('athlete_mp.id', 'desc')
                        ->first();
                $mealPlans = MealPlans::where([
                    'user_id' => $userId,
                    'deleted' => 0,
                ])->get();
                $workoutPlans = WorkoutPlans::where([
                    'user_id' => $userId,
                    'deleted' => 0,
                ])->get();
              $certifications = Certifications::where('user_id', '=', $userId)->orderBy('year','desc')->get();
              $messages = Messages::get();
                return view('admin.client', [
                    'data' => $data,
                    'orders' => $orders,
                    'subscriptions' => $subscriptions,
                    'results' => $results,
                    'shows' => $shows,
                    'athleteMp' => $athleteMp,
                    'athleteWp' => $athleteWp,
                    'mealPlans' => $mealPlans,
                    'workoutPlans' => $workoutPlans,
                    'certifications' => $certifications,
                    'messages' => $messages,
                ]);
            } else {
                return redirect('home');
            }
        } else {
            return redirect('home');
        }
    }

}

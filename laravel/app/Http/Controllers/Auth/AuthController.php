<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {

use AuthenticatesAndRegistersUsers;

    public function __construct(Guard $auth, Registrar $registrar) {
        $this->auth = $auth;
        $this->registrar = $registrar;
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    public function getLogout() {

        $this->auth->logout();
        \Session::flush();
        return redirect('home');
    }

    protected $redirectPath = '/admin';
    protected $loginPath = 'login';

}

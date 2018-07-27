<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\User;

class AthletesController extends AdminController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {

        $data['model'] = User::where('role_id', 2)->paginate(9);

        return view('admin.athletes', $data);
    }

}

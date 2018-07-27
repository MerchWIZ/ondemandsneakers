<?php
namespace App\Http\Controllers\Admin;
use DB;
use App\Http\Requests;
use Validator, Input, Redirect;
use Illuminate\Http\Request;
use App\Newsletter;
use App\Http\Controllers\AdminController;

class ManageNewsletterController extends AdminController {

    public function __construct() {

         $this->middleware('auth');
    }

    public function index()
    {
    	$newsletter = Newsletter::orderBy('id', 'desc')->paginate(5);
        return view('admin.newsletter.index', compact('newsletter'));
    }

    public function delete($id, Request $request) {
        $row = Newsletter::where('id', '=', $id)->delete();
        $request->session()->flash('alert-success', 'Successfully Deleted!');
        return back();
    }

        
    

}

?>
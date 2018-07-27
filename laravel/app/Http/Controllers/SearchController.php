<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Ambassadors;
use App\Specialities;
use Illuminate\Http\Request;

class SearchController extends Controller {
    
    public function search(Request $request) {
        
        $data['search'] = $request['q'];
        
        $data['ambassadors'] = Ambassadors::search($data['search']);
        $data['specialities']= Specialities::get();

        return view('front.search',$data);
    }
    
    



}
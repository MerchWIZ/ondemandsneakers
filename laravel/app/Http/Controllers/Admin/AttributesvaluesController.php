<?php 
namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\AdminController;
use Validator, Input, Redirect; 

use DB;
use Auth;
use App\Attributes;
use App\Attributesvalues;
use Session;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;

class AttributesvaluesController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	 
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	/**
	 * All Cafe's For Admin.
	 */
	public function index()
	{
	   $attributes =Attributes::all();
        return view('admin.attributes.index',[
			'attributes' => $attributes,
			]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	 
	
	public function create($attribute_id)
	{	   
	   return view('admin.attributes_values.create',compact('attribute_id'));
    }
	
    /**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function insert(Request $request)
	{
	   	$validator = Validator::make($request->all(), [
    		'name'     => 'required|max:255',
         ]);
         
        if ($validator->fails()) {
		  return redirect()->back()->withErrors($validator->errors());
		}
				
				
				$model = new AttributesValues;
				$model->name = $request->name;
                $model->price = $request->price;
                $model->attribute_id = $request->attribute_id;
                $model->save();
                \Session::flash('success', 'Attribute Value Added Successfully!');
				return redirect('admin/attributes/values/'.$request->attribute_id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{	
		$row = Attributes::where('id', '=', $id)->get();
       
		//print_r($row);
		//exit;
		return view('admin.attributes_view')->with('result',$row);
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id,$attribute_id)
	{
        $attribute = AttributesValues::findOrFail($id);
        return view('admin.attributes_values.edit',compact('attribute','attribute_id'))->with('id',$id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
        $id = $request->id;
        $attribute = AttributesValues::findOrFail($id);
        $input = $request->all();
        unset($input['_token']);
        $affectedRows = AttributesValues::where('id', '=', $id)->update($input);
        
        \Session::flash('message', 'Updated Successfully!');
		return redirect('admin/attributes/values/'.$request->attribute_id);
	}
    
   	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id,$attribute_id)
	{
	   $row = AttributesValues::where('id', '=', $id)->delete();
	   return redirect('admin/attributes/values/'.$attribute_id);
	}

}
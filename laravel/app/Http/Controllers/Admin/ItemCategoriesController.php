<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\AdminController;
use App\ItemCategories;
use Validator,
    Input,
    Redirect;
use DB;
use Auth;
use Session;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;

class ItemCategoriesController extends AdminController {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $categories = ItemCategories::orderBy('name', 'asc')->get();
        return view('admin.item.categories.index', [
            'categories' => $categories,
        ]);
    }

    public function create() {
        $result = ItemCategories::lists('name', 'id');
        return view('admin.item.categories.create');
    }

    public function insert(Request $request) {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:255|unique:item_categories'
        ]);


        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $model = new ItemCategories;

        $model->name = $request->name;
        $model->save();
        \Session::flash('success', 'Category Added Successfully!');
        return redirect('admin/item/categories');
    }

    public function show($id) {
        $row = ItemCategories::where('id', '=', $id)->get();
        return view('admin.item.view')->with('result', $row);
    }

    public function edit($id) {
        $category = ItemCategories::findOrFail($id);
        return view('admin.item.categories.edit', compact('category'))->with('id', $id);
    }

    public function update($id,
            Request $request) {
        $id = $request->id;

        $category = ItemCategories::findOrFail($id);
        $input = $request->all();

        unset($input['_wysihtml5_mode']);
        unset($input['_token']);
        $affectedRows = ItemCategories::where('id', '=', $id)->update($input);

        \Session::flash('message', 'Updated Successfully!');
        return redirect('admin/item/categories');
    }

    public function delete($id) {
        $row = ItemCategories::where('id', '=', $id)->delete();
        return redirect('admin/item/categories');
    }

}

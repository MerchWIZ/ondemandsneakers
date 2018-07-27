<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\AdminController;
use App\ItemCategories;
use App\ItemPosts;
use Validator,
    Input,
    Redirect;
use DB;
use Auth;
use App\BlogPosts;
use App\BlogCategories;
use Session;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;

class ItemPostsController extends AdminController {

    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $post = ItemPosts::orderBy('name', 'asc')->get();

        $posts = ItemPosts::getItem();
        
        return view('admin.item.posts.index', compact('posts'));
    }

    public function create() {
        $categories = ItemCategories::lists('name', 'id');
        $productsCategories = array();
        return view('admin.item.posts.create', compact('categories', 'productsCategories'));
    }

    public function insert(Request $request) {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|max:150|unique:blog_posts',
                    'cat_id' => 'required',
                    'image' => 'mimes:jpeg,png,gif,svg',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $model = new ItemPosts;

        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $destinationPath = public_path() . '/uploads/tool_items/';
            $destinationPathThumb = $destinationPath . 'thumbnail/';


            $extension = $file->getClientOriginalExtension();
            $fileName = rand(111, 999) . time() . '.' . $extension;
            $image = $destinationPath . '/' . $fileName;
            $upload_success = $file->move($destinationPath, $fileName);
//            $upload = Image::make($image)->resize(150, 150)->save($destinationPathThumb . $fileName);
            $model->image = $fileName;
        }

        $model->name = $request->name;
        $model->cat_id = $request->cat_id;

        $model->save();
        \Session::flash('success', 'Post added successfully!');
        return redirect('admin/item/posts');
    }

    public function show($id) {
        $row = ItemPosts::where('id', '=', $id)->get();
        return view('admin.item.view')->with('result', $row);
    }

    public function edit($id) {

        $post = ItemPosts::findOrFail($id);
        $categories = ItemCategories::lists('name', 'id');
        return view('admin.item.posts.edit', compact('post', 'categories'))->with('id', $id);
    }

    public function update($id,
            Request $request) {
        $id = $request->id;

        $category = ItemPosts::findOrFail($id);
        $input = $request->all();

        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $destinationPath = public_path() . '/uploads/tool_items/';
            //$destinationPathThumb = $destinationPath . 'thumbnail/';

            $extension = $file->getClientOriginalExtension();
            $fileName = rand(111, 999) . time() . '.' . $extension;
            $image = $destinationPath . '/' . $fileName;
            $upload_success = $file->move($destinationPath, $fileName);
          //  $upload = Image::make($image)->resize(150, 150)->save($destinationPathThumb . $fileName);
            $input['image'] = $fileName;
        }


        unset($input['_wysihtml5_mode']);
        unset($input['_token']);
        $affectedRows = ItemPosts::where('id', '=', $id)->update($input);

        \Session::flash('message', 'Post updated successfully!');
        return redirect('admin/item/posts');
    }

    public function delete($id) {
        $row = ItemPosts::where('id', '=', $id)->delete();
        return redirect('admin/item/posts');
    }

}

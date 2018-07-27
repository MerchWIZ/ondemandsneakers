<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminController;
use App\Categories;
use App\ProductsCategories;
use App\Products;
use App\Urls;
use App\Functions\Functions;
use Illuminate\Http\Request;
use Validator,
    Input,
    Redirect;
use Intervention\Image\Facades\Image as Image;
use App\Attributes;
use App\ProductsAttributes;

class ProductsController extends AdminController {

    public function __construct() {
        parent::__construct();
    }

    public function index() {


        $products = Products::where('deleted', '0')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create() {
        if (isset($_GET['type'])) {
            $type = $_GET['type'];
        } else {
            $type = 'simple';
        }
        $categories = Categories::lists('name', 'id');
        // $allCategories = Categories::orderBy('parent_id', 'asc')->get();
        // $categories = Functions::getCategories($allCategories);
        $attributes = Attributes::lists('name', 'id');

        $productAttributes = NULL;
        $productsCategories = NULL;
        $url = NULL;

        return view('admin.products.create', compact('categories', 'attributes', 'productAttributes', 'productsCategories', 'type', 'categories', 'url'));
    }

    public function insert(Request $request) {

        $rules = [
            'name' => 'required|max:100',
            'price' => 'required|numeric',
            'key' => 'required|unique:urls'
        ];

        //$rules['url'] = 'required';
        $rules['description'] = 'required';
        $rules['image'] = 'mimes:jpeg,bmp,png,gif';

        if ($request->sale == 1) {
            $rules['salePrice'] = 'required|numeric';
        }

        $validator = Validator::make($request->all(), $rules);
        $fileName = "";
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        if (Input::hasFile('image')) {
            $file = Input::file('image');
            $destinationPath = public_path() . '/uploads/products/';
            $destinationPathThumb = $destinationPath . 'thumbnail/';
            $fileName = Functions::saveImage($file, $destinationPath, $destinationPathThumb);
            $upload = Image::make($destinationPath . $fileName)->fit(280)->save($destinationPathThumb . $fileName);
        }


        $model = new Products;
        $model->name = $request->name;
        $model->price = $request->price;
        $model->sku = $request->sku;
        $model->teaser = $request->teaser;
        $model->description = $request->description;
        $model->keywords = $request->keywords;
        $model->image = $fileName;
        $model->sale = $request->sale;
        $model->salePrice = $request->salePrice;
        $model->save();
        
        if (!empty($request['categories'])) {

            foreach ($request['categories'] as $category_id) {
                $categoryModel = new ProductsCategories();
                $categoryModel->product_id = $model->id;
                $categoryModel->category_id = $category_id;
                $categoryModel->save();
            }
        }

        if (!empty($request['attributes'])) {
            foreach ($request['attributes'] as $attribute_id) {
                $attributeModel = new ProductsAttributes;
                $attributeModel->product_id = $model->id;
                $attributeModel->attribute_id = $attribute_id;
                $attributeModel->save();
            }
        }
        $input['type'] = strtolower(\Config::get('params.type.product'));
        $input['type_id'] = $model->id;
        $input['key'] = $request->key;
        $url = Urls::saveUrl($input);

        \Session::flash('success', 'Added Successfully!');

        return redirect('admin/products?type=' . $request->type);
    }

    public function edit($id) {
        $product = Products::findOrFail($id);
        $selectedCategories = ProductsCategories::where('product_id', $id)->get();
        $productsCategories = array();
        foreach ($selectedCategories as $pc) {
            $productsCategories[] = $pc->category_id;
        }

        $attributes = Attributes::lists('name', 'id');
        $selectedAttributes = ProductsAttributes::where('product_id', $id)->orderBy('id')->get();
        $productAttributes = array();
        foreach ($selectedAttributes as $a) {
            $productAttributes[] = $a->attribute_id;
        }

        $urls = Urls::where('type_id', $id)->first();
        if (!empty($urls)) {
            $url = $urls->key;
        } else {
            $url = null;
        }

        $categories = Categories::lists('name', 'id');
        return view('admin.products.edit', compact('product', 'categories', 'productsCategories', 'productAttributes', 'attributes', 'url'))->with('id', $id);
    }

    public function update($id, Request $request) {
        $rules = [
            'name' => 'required|max:100',
            'price' => 'required|numeric',
//            'key' => 'required|unique:urls,key,' . $request->key
        ];
        
        $rules['description'] = 'required';
        $rules['image'] = 'mimes:jpeg,bmp,png,gif';

        if ($request->sale == 1) {
            $rules['salePrice'] = 'required|numeric';
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }
        $id = $request->id;
        $product = Products::findOrFail($id);
        $input = $request->all();

        if (Input::hasFile('image')) {

            $file = Input::file('image');
            $destinationPath = public_path() . '/uploads/products/';
            $destinationPathThumb = $destinationPath . 'thumbnail/';

            $extension = $file->getClientOriginalExtension();
            $fileName = rand(111, 999) . time() . '.' . $extension;
            $image = $destinationPath . '/' . $fileName;
            $upload_success = $file->move($destinationPath, $fileName);
            $upload = Image::make($image)->fit(280)->save($destinationPathThumb . $fileName);
            $input['image'] = $fileName;
        }
        if (!isset($input['sale'])) {
            $input['sale'] = 0;
        }

        unset($input['_token']);
        unset($input['attributes']);
        unset($input['categories']);
        unset($input['key']);
        unset($input['type']);
        $affectedRows = Products::where('id', '=', $id)->update($input);

        if (!empty($request['key'])) {
            $input['type'] = strtolower(\Config::get('params.type.product'));
            $input['type_id'] = $id;
            $input['key'] = $request->key;
            Urls::saveUrl($input);
        }
        if (!empty($request['categories'])) {
            $productsCategories = ProductsCategories::where('product_id', $id)->delete();
            foreach ($request['categories'] as $category_id) {
                $categoryModel = new ProductsCategories;
                $categoryModel->product_id = $id;
                $categoryModel->category_id = $category_id;
                $categoryModel->save();
            }
        }

        if (!empty($request['attributes'])) {

            $deleteAttributes = ProductsAttributes::where('product_id', $id)->delete();

            foreach ($request['attributes'] as $attribute_id) {
                $attributeModel = new ProductsAttributes;
                $attributeModel->product_id = $id;
                $attributeModel->attribute_id = $attribute_id;
                $attributeModel->save();
            }
        }
        \Session::flash('message', 'Updated Successfully!');
        return redirect('admin/products');
    }

    public function delete($id) {

        $row = Products::where('id', '=', $id)->delete();
        Urls::deleteUrl($id);

        return redirect('admin/products');
    }

}

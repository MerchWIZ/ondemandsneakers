<?php

Route::group(
        array('prefix' => 'admin'), function() {
    $admin = "Admin\\";

    Route::get('/', $admin . 'HomeController@index');
    Route::get('/user/approve/{id}', $admin . 'HomeController@accept');
    Route::get('/user/disapprove/{id}', $admin . 'HomeController@reject');
    Route::get('user/edit/{id}', $admin . 'HomeController@edit');
    Route::post('/ambassador/store', $admin . 'AmbassadorsController@store');
    Route::patch('/ambassador/update/{id}', $admin . 'AmbassadorsController@update');


    Route::get('/athletes', $admin . 'AthletesController@index');
    // Route::get('/athlete/approve/{id}',$admin . 'AthletesController@accept');
    // Route::get('/athlete/disapprove/{id}',$admin . 'AthletesController@reject');

    Route::get('categories', $admin . 'CategoriesController@index');
    Route::get('categories/create', $admin . 'CategoriesController@create');
    Route::get('categories/createSubcat', $admin . 'CategoriesController@create_sub_cat');
    Route::post('categories/storeSubcat', $admin . 'CategoriesController@store_sub_cat');
    Route::post('categories/insert', $admin . 'CategoriesController@insert');
    Route::get('categories/delete/{id}', $admin . 'CategoriesController@delete');
    Route::get('categories/edit/{id}', $admin . 'CategoriesController@edit');
    Route::get('categories/show', $admin . 'CategoriesController@show');
    Route::post('categories/update/{id}', $admin . 'CategoriesController@update');

    Route::get('products', $admin . 'ProductsController@index');
    Route::get('products/create', $admin . 'ProductsController@create');
    Route::post('products/insert', $admin . 'ProductsController@insert');
    Route::get('products/delete/{id}', $admin . 'ProductsController@delete');
    Route::get('products/edit/{id}', $admin . 'ProductsController@edit');
    Route::post('products/update/{id}', $admin . 'ProductsController@update');

    Route::get('productsimages', $admin . 'ProductsimagesController@index');
    Route::get('productsimages/manage/{id}', $admin . 'ProductsimagesController@manage');
    Route::post('productsimages/insert', $admin . 'ProductsimagesController@insert');
    Route::get('productsimages/delete/{id}/{attribute_id}', $admin . 'ProductsimagesController@delete');

    Route::get('attributes', $admin . 'AttributesController@index');
    Route::get('attributes/index', $admin . 'AttributesController@index');
    Route::get('attributes/create', $admin . 'AttributesController@create');
    Route::post('attributes/insert', $admin . 'AttributesController@insert');
    Route::get('attributes/delete/{id}', $admin . 'AttributesController@delete');
    Route::get('attributes/edit/{id}', $admin . 'AttributesController@edit');
    Route::post('attributes/update/{id}', $admin . 'AttributesController@update');
    Route::get('attributes/values/{id}', $admin . 'AttributesController@values');

    Route::get('attributes_values/create/{attibute_id}', $admin . 'AttributesvaluesController@create');
    Route::post('attributes_values/insert', $admin . 'AttributesvaluesController@insert');
    Route::get('attributes_values/edit/{id}/{attribute_id}', $admin . 'AttributesvaluesController@edit');
    Route::post('attributes_values/update/{id}', $admin . 'AttributesvaluesController@update');
    Route::get('attributes_values/delete/{id}/{attribute_id}', $admin . 'AttributesvaluesController@delete');

    Route::get('productsimages', $admin . 'ProductsimagesController@index');
    Route::get('productsimages/manage/{id}', $admin . 'ProductsimagesController@manage');
    Route::post('productsimages/insert', $admin . 'ProductsimagesController@insert');
    Route::get('productsimages/delete/{id}/{attribute_id}', $admin . 'ProductsimagesController@delete');

    Route::get('shipping', $admin . 'ShippingController@index');
    Route::get('shipping/create', $admin . 'ShippingController@create');
    Route::post('shipping/insert', $admin . 'ShippingController@insert');
    Route::get('shipping/delete/{id}', $admin . 'ShippingController@delete');
    Route::get('shipping/edit/{id}', $admin . 'ShippingController@edit');
    Route::post('shipping/update/{id}', $admin . 'ShippingController@update');

    Route::get('coupons', $admin . 'CouponsController@index');
    Route::get('coupons/create', $admin . 'CouponsController@create');
    Route::post('coupons/insert', $admin . 'CouponsController@insert');
    Route::post('coupons/update/{id}', $admin . 'CouponsController@update');
    Route::get('coupons/delete/{id}', $admin . 'CouponsController@delete');
    Route::get('coupons/edit/{id}', $admin . 'CouponsController@edit');
    Route::post('coupons/update/{id}', $admin . 'CouponsController@update');

    Route::get('content', $admin . 'ContentController@index');
    Route::get('content/create', $admin . 'ContentController@create');
    Route::post('content/insert', $admin . 'ContentController@insert');
    Route::get('content/edit/{id}', $admin . 'ContentController@edit');
    Route::post('content/update/{id}', $admin . 'ContentController@update');
    Route::get('content/delete/{id}', $admin . 'ContentController@delete');

    Route::get('contactus', $admin . 'ContactusController@index');
    Route::get('contactusdetail/{id}', $admin . 'ContactusController@detail');

    Route::get('orders', $admin . 'OrdersController@index');
    Route::get('order/{id}', $admin . 'OrdersController@order');
    Route::post('orderStatus', $admin . 'OrdersController@order_status');
    Route::post('updateOrderStatus', $admin . 'OrdersController@update_order_status');

    Route::get('orders/results/{order_id}', $admin . 'OrdersresultsController@create');
    Route::get('orders/results/edit/{order_id}', $admin . 'OrdersresultsController@edit');
    Route::post('orders/results/insert', $admin . 'OrdersresultsController@insert');
    Route::post('orders/results/update/{id}', $admin . 'OrdersresultsController@update');
    Route::get('orders/results/delete/{id}', $admin . 'OrdersresultsController@delete');

    Route::get('blog/categories', $admin . 'BlogCategoriesController@index');
    Route::get('blog/categories/create', $admin . 'BlogCategoriesController@create');
    Route::post('blog/categories/insert', $admin . 'BlogCategoriesController@insert');
    Route::get('blog/categories/delete/{id}', $admin . 'BlogCategoriesController@delete');
    Route::get('blog/categories/edit/{id}', $admin . 'BlogCategoriesController@edit');
    Route::post('blog/categories/update/{id}', $admin . 'BlogCategoriesController@update');

    Route::get('blog/posts', $admin . 'BlogPostsController@index');
    Route::get('blog/posts/create', $admin . 'BlogPostsController@create');
    Route::post('blog/posts/insert', $admin . 'BlogPostsController@insert');
    Route::get('blog/posts/delete/{id}', $admin . 'BlogPostsController@delete');
    Route::get('blog/posts/edit/{id}', $admin . 'BlogPostsController@edit');
    Route::post('blog/posts/update/{id}', $admin . 'BlogPostsController@update');


    Route::get('newsletter/list', $admin . 'ManageNewsletterController@index');
    Route::get('newsletter/delete/{id}', $admin . 'ManageNewsletterController@delete');
}
);

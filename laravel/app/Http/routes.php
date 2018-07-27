<?php

Route::get('/', 'HomeController@index');

Route::post('save-texture-image', 'ToolController@saveTextureImage');

Route::post('save-custom-item-image', 'ToolController@saveCustomItemImage');


Route::get('textured-logo-image/{source_image}/{texture_path}/{product_name}/{logo_url}/{logo_x}/{logo_y}/{logo_width}/{logo_height}', 'ToolController@getTexturedLogoImage');


//Route::post('textured-from-canvas/{source_image}/{texture_path}/{product_name}/{sole_color}', 'ToolController@getTexturedImageFromCanvas');
Route::post('textured-from-canvas', 'ToolController@getTexturedImageFromCanvas');
Route::get('all-textured-image/{id}/{product_id}/{texture_scale}/{sole_color}', 'ToolController@getTexturedImageForAll');
Route::get('textured-image/{id}/{product_caption}/{path}/{texture_scale}/{sole_color}/{image_view}', 'ToolController@getTexturedImage');
Route::get('textured-logo-text-image/{source_image}/{texture_path}/{product_name}/{logo_url}/{logo_x}/{logo_y}/{logo_width}/{logo_height}/{text}/{text_size}/{text_color}/{font}/{text_x}/{text_y}/{texture_scale}/{sole_color}', 'ToolController@getTexturedLogoTextImage');

Route::get('demo/{id}', 'HomeController@demo');
Route::get('demo', 'HomeController@demoPage');
Route::get('home', 'HomeController@index');
Route::get('how-to-order', 'HomeController@howtoorder');
Route::get('about-us', 'HomeController@aboutus');
Route::get('terms', 'HomeController@terms');
Route::get('privacy', 'HomeController@privacy');
Route::get('faq', 'HomeController@faq');
Route::get('returns', 'HomeController@returns');
Route::get('bulk-orders', 'HomeController@bulkOrders');
Route::get('design-guidelines', 'HomeController@DesignGuidelines');
Route::get('terms-conditions', 'HomeController@termsConditions');
Route::get('sitemap', 'HomeController@sitemap');
//Route::get('contact-us', 'HomeController@contact');
Route::get('contact-us', 'ContactusController@index');
Route::get('get-started', 'HomeController@getstarted');
Route::get('shipping-rates', 'HomeController@shippingRates');

Route::controllers(['auth' => 'Auth\AuthController', 'password' => 'Auth\PasswordController',]);
Route::post('contact-send', 'ContactusController@store');
Route::get('search', 'HomeController@search');
Route::get('product-search', 'HomeController@productSearch');
Route::get('products/{id}', 'HomeController@index');
Route::get('shop', 'HomeController@products');
Route::get('product/{id}', 'HomeController@getproduct');
Route::get('apparel/{id}', 'HomeController@getproduct');
Route::get('category/{id}', 'HomeController@productByCatId');
Route::get('page/{code}', 'PageController@view');

Route::get('category/{url}', 'PageController@category');

Route::get('products/{id}', 'HomeController@products');
Route::get('products', 'HomeController@products');
Route::get('apparels', 'HomeController@apparel');
Route::get('/guestbook', [
    'uses' => 'HomeController@guestbook',
    'as' => 'guestbook.messages',
]);

Route::get('forgot', 'SignupController@forgot_password');
Route::post('reset', 'SignupController@reset_password');
Route::post('savemessage', 'HomeController@messagePost');
Route::get('page/{code}', 'PageController@view');
Route::get('myorders', 'OrdersController@myorders');
Route::get('order/{id}', 'OrdersController@order');
Route::get('cart/add', 'CartController@add');
Route::post('cart/addcustomizeproduct', 'CartController@addCustomizeProduct');
Route::post('cart/addcustomizedesign', 'CartController@addCustomizeDesign');
Route::post('tool/saveDesign', 'ToolController@saveDesign');
Route::get('mydesigns', 'ToolController@myDesigns');
Route::get('design/{id}', 'ToolController@getDesignDetail');
Route::get('design/delete/{id}', 'ToolController@delete');


Route::post('cart/showPage', 'CartController@showTestPage');

Route::get('productcartinfo/{product_id}/{design_id}', 'ToolController@showCartModal');


Route::get('cart/addsimple', 'CartController@addsimple');
Route::get('cart/updateproductprice', 'CartController@updateproductprice');
Route::get('cart/view', 'CartController@mycart');
Route::get('cart/', 'CartController@mycart');
Route::get('cart/delete/{id}', 'CartController@delete');
Route::get('cart/update', 'CartController@update');
Route::get('checkout', 'CheckoutController@index');
Route::post('postOrder', 'CheckoutController@order');
Route::get('checkout/success/{id}', 'CheckoutController@success');
Route::get('checkout/fail', 'CheckoutController@fail');
Route::get('register/success/{id}', 'SignupController@success');
Route::get('mycart', 'CartController@index');
Route::get('admin/client/{id}', 'ClientsController@userDetail');
Route::post('admin/clientOrderStatus', 'ClientsController@ordersBystatus');
Route::post('changeprofileimage', 'CustomersController@changeprofileimage');

Route::get('profile-picture', 'CustomersController@profilePicture');

//Route for Newsletter
Route::post('newsletter/store', 'NewsletterController@store');

Route::get('clients', 'ClientsController@index');
//Route for Messages
Route::post('messages', 'ProfileController@saveReview');

Route::get('login', 'SignupController@login');
Route::get('signup', 'SignupController@signup');
Route::get('signup/athlete', 'SignupController@register');
Route::get('signup/ambassador', 'SignupController@register');
Route::get('signup/user', 'SignupController@register');
Route::post('/signUpPost', 'SignupController@store');
Route::post('postLogin', 'SignupController@postLogin');
Route::post('postLoginPopup', 'SignupController@postLoginPopup');
Route::get('changepassword', 'CustomersController@changepassword');
Route::post('postchangepassword', 'CustomersController@postchangepassword');

Route::get('certifications/create', 'CertificationsController@create');
Route::post('certifications/store', 'CertificationsController@store');
Route::get('certifications/edit/{id}', 'CertificationsController@edit');
Route::post('certifications/update', 'CertificationsController@update');
Route::get('certifications/delete/{id}', 'CertificationsController@delete');

Route::get('shows/create', 'ShowsController@create');
Route::post('shows/store', 'ShowsController@store');
Route::get('shows/edit/{id}', 'ShowsController@edit');
Route::post('shows/update', 'ShowsController@update');
Route::get('shows/delete/{id}', 'ShowsController@delete');

Route::get('profile/edit', 'CustomersController@editprofile');
Route::get('professional/edit', 'ProfessionalController@edit');
Route::get('address/edit', 'AddressController@edit');

Route::get('profile', 'CustomersController@profile');
Route::get('professional', 'ProfessionalController@index');
Route::get('address', 'AddressController@index');
Route::get('shows', 'ShowsController@index');
Route::get('certifications', 'CertificationsController@index');
Route::get('subscriptions', 'SubscriptionsController@index');
Route::get('meal-plans', 'MealPlansController@index');
Route::get('workout-plans', 'WorkoutPlansController@index');
Route::get('training-details', 'TrainingController@index');
Route::get('calculators', 'CalculatorController@index');
Route::get('calculators/fitness-detail', 'CalculatorController@detail');


Route::post('updateprofile', 'CustomersController@updateprofile');
Route::post('updateprofessional', 'ProfessionalController@update');
Route::post('updateaddress', 'AddressController@update');

//MealPlans Route
Route::get('meal-plans/create', 'MealPlansController@create');
Route::post('meal-plans/store', 'MealPlansController@store');
Route::get('meal-plans/edit/{id}', 'MealPlansController@edit');
Route::post('meal-plans/update', 'MealPlansController@update');
Route::get('meal-plans/delete/{id}', 'MealPlansController@delete');
//WorkoutPlans Route
Route::get('workout-plans/create', 'WorkoutPlansController@create');
Route::post('workout-plans/store', 'WorkoutPlansController@store');
Route::get('workout-plans/edit/{id}', 'WorkoutPlansController@edit');
Route::post('workout-plans/update', 'WorkoutPlansController@update');
Route::get('workout-plans/delete/{id}', 'WorkoutPlansController@delete');

Route::post('add-mplan', 'MealPlansController@addPlan');
Route::post('add-wplan', 'WorkoutPlansController@addPlan');

//Search Route
Route::get('search', 'SearchController@search');
Route::get('/user/{id}', 'ProfileController@index');
//Route for Ambassadors Subscriptions
Route::post('subscribe', 'ProfileController@store');
Route::get('unsubscribe/{id}', 'ProfileController@update');

Route::get('results', 'ResultsController@index');
Route::post('results/save', 'ResultsController@save');

Route::get('results/savedate', 'ResultsController@savedate');
Route::get('results/savecaption', 'ResultsController@savecaption');
Route::post('results/saveimage', 'ResultsController@saveimage');
Route::post('results/deleteimage', 'ResultsController@deleteimage');

Route::post('coupons/apply', 'CouponsController@apply');
Route::group(
        array('prefix' => 'paypal'), function() {
    $folder = "Payments\\";
    Route::get('success', $folder . 'PaypalController@success');
    Route::get('cancel', $folder . 'PaypalController@cancel');
}
);

Route::group(
        array('prefix' => 'check'), function() {
    $folder = "Payments\\";
    Route::get('success', $folder . 'CheckController@success');
    Route::get('cancel', $folder . 'CheckController@cancel');
}
);

Route::get('blog', 'BlogController@index');
Route::get('blog/{q}', 'BlogController@index');
Route::get('blog/post/{id}', 'BlogController@post');



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

    Route::get('specialities', $admin . 'SpecialitiesController@index');
    Route::get('specialities/create', $admin . 'SpecialitiesController@create');
    Route::post('specialities/insert', $admin . 'SpecialitiesController@insert');
    Route::get('specialities/edit/{id}', $admin . 'SpecialitiesController@edit');
    Route::post('specialities/update/{id}', $admin . 'SpecialitiesController@update');
    Route::get('specialities/delete/{id}', $admin . 'SpecialitiesController@delete');

    Route::get('certifications', $admin . 'CertificationsController@index');
    Route::get('certifications/view/{id}', $admin . 'CertificationsController@view');
    Route::get('certifications/delete/{id}', $admin . 'CertificationsController@delete');

    Route::get('subscriptions', $admin . 'SubscriptionsController@index');

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



    Route::get('item/categories', $admin . 'ItemCategoriesController@index');
    Route::get('item/categories/create', $admin . 'ItemCategoriesController@create');
    Route::post('item/categories/insert', $admin . 'ItemCategoriesController@insert');
    Route::get('item/items/categories/delete/{id}', $admin . 'ItemCategoriesController@delete');
    Route::get('item/items/categories/edit/{id}', $admin . 'ItemCategoriesController@edit');
    Route::post('item/categories/update/{id}', $admin . 'ItemCategoriesController@update');


    Route::get('item/posts', $admin . 'ItemPostsController@index');
    Route::get('item/posts/create', $admin . 'ItemPostsController@create');
    Route::post('item/posts/insert', $admin . 'ItemPostsController@insert');
    Route::get('item/posts/delete/{id}', $admin . 'ItemPostsController@delete');
    Route::get('item/posts/edit/{id}', $admin . 'ItemPostsController@edit');
    Route::post('item/posts/update/{id}', $admin . 'ItemPostsController@update');


    Route::get('newsletter/list', $admin . 'ManageNewsletterController@index');
    Route::get('newsletter/delete/{id}', $admin . 'ManageNewsletterController@delete');
}
);

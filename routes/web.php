<?php
/*
 * Copyright @ Solacer 2021 by Sheikh Thanbir Alam
 */
Route::get('/', 'CustomerController@index');
Route::get('/customer/contact', 'CustomerController@contact');
Route::post('/customer/contact/submit', 'CustomerController@contactSubmit');
Route::get('/all-products', 'CustomerController@allProduct');
Route::get('/all-products/{id}', 'CustomerController@singlepage');
Route::post('/all-products/search', 'CustomerController@search');
Route::get('/customer/membership', 'CustomerController@membership');
Route::post('/customer/membership', 'CustomerController@membershipSubmit');
Route::get('/customer/login', 'CustomerController@login');
Route::post('/customer/login/otp', 'CustomerController@loginOTPSend');
Route::post('/customer/login', 'CustomerController@loginSubmit')->middleware('web');
Route::post('/customer/logout', 'CustomerController@logoutSubmit');
Route::get('/customer/dashboard/{id}', 'CustomerController@dashboard')->name('customer_dashboard');//*********************************** 25:29
Route::post('/customer/temp_bag', 'CustomerController@tempBag');
Route::get('/error', function (){
    return view('customer.Error.error');
});


Route::get('/checkout/cart', 'CustomerController@cart');
Route::post('/checkout/cart/all', 'CustomerController@cartPost');
Route::post('/checkout/cart/order', 'CustomerController@cartOrder');
Route::post('/checkout/cart/product-remove', 'CustomerController@cartProductRemove');
Route::post('/checkout/cart/remove', 'CustomerController@cartRemove');




Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');
//group of admin route
Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{
    Route::resource('/front_view', 'FrontViewController');
    Route::post('/front_view/status_change','FrontViewController@statusEdit');
    Route::resource('/about_solacer','AboutSolacerController');
    Route::resource('/all_products','AllProductController');
    Route::post('/all_products/update','AllProductController@update_m');
    Route::resource('/team','TeamController');
    Route::post('/team/update','TeamController@update_m');
    Route::resource('/social_media','SocialMediaController');
    Route::resource('/add_users','AddUserController');
    Route::resource('/sms_service','SmsServiceController');
    Route::resource('/contact','ContactController');
    Route::post('/contact/update','ContactController@update_m');
    Route::resource('/members','MembersController');
    Route::resource('/customer_order','OrdersController');//in store method we do update here
    Route::post('/customer_order/message','OrdersController@message');//in store method we do update here
    Route::resource('/password_reset','PasswordResetController');//in store method we do update here
});

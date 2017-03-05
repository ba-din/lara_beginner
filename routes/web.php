<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Admin route

Route::get('admin', ['as' => 'admin', 'uses' => 'AdminController@index']);

// Authentication Routes...

Route::get('login', 'Auth\AuthController@showLoginForm')->name('login');
Route::post('login', 'Auth\AuthController@login');
Route::post('logout', 'Auth\AuthController@logout');

// Home page route

Route::get('/', ['as' => 'home', 'uses' => 'PagesController@index']);

// Password Reset Routes...

Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

// Privacy

Route::get('privacy', 'PagesController@privacy');

// Registration Routes...

Route::get('register', 'Auth\AuthController@showRegistrationForm');
Route::post('register', 'Auth\AuthController@register');

// Social routes

Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');

Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');


// Terms of Service

Route::get('terms-of-service', 'PagesController@terms');

//Test route

Route::get('test',  ['middleware' => 'auth', 'uses' => 'TestController@index']);

// Widget routes

Route::get('widget/create', ['as' => 'widget.create', 'uses' => 'WidgetController@create']);

Route::get( 'widget/{id}-{slug?}', ['as' => 'widget.show', 'uses' => 'WidgetController@show']);

Route::resource('widget', 'WidgetController', ['except' => ['show', 'create']]);

// Profile Routes
Route::resource('profile', 'ProfileController');

Route::get('show-profile', ['as' => 'show-profile','uses' => 'ProfileController@showProfileToUser']);

Route::get('my-profile', ['as' => 'my-profile','uses' => 'ProfileController@myProfile']);

// Setting Routes
Route::get('settings', 'SettingsController@edit');
Route::post('settings', ['as' => 'userUpdate','uses' => 'SettingsController@update']);

// Images Route
Route::resource('marketing-image', 'MarketingImageController');

// Api Routes
Route::get('api/widget-data', 'ApiController@widgetData');

Route::get('api/marketing-image-data', 'ApiController@marketingImageData');
// Begin Category Routes

Route::any('api/category-data', 'ApiController@categoryData');

Route::get('category/create', ['as' => 'category.create', 'uses' => 'CategoryController@create']);

Route::get('category/{id}-{slug?}', ['as' => 'category.show', 'uses' => 'CategoryController@show']);

Route::resource('category', 'CategoryController', ['except' => ['show', 'create']]);

// End Category Routes
// Begin Subcategory Routes

Route::any('api/subcategory-data', 'ApiController@subcategoryData');

Route::get('subcategory/create', ['as' => 'subcategory.create', 'uses' => 'SubcategoryController@create']);

Route::get('subcategory/{id}-{slug?}', ['as' => 'subcategory.show', 'uses' => 'SubcategoryController@show']);

Route::resource('subcategory', 'SubcategoryController', ['except' => ['show', 'create']]);

// End Subcategory Routes
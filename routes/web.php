<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::resource('/','HomePageController');
Route::get('/getProduct/{id}','HomePageController@ProductCat');

Route::resource('/login', 'LoginController');
Route::post('/login/check', 'LoginController@check');

Route::group(['middleware' => ['admin']], function () {
    Route::resource('/products', 'ProductController');
    Route::post('/products/store', 'ProductController@store');
    Route::post('/products/update', 'ProductController@store');

    Route::resource('/productscategory', 'ProductsCategoryController');
    Route::post('/productscategory/store', 'ProductsCategoryController@store');
    Route::post('/productscategory/update', 'ProductsCategoryController@store');

    Route::get('/SignOut', function() {
        session()->forget('admin_id');
        session()->forget('is_login');
        return redirect()->to('/login')->send();
    });
});

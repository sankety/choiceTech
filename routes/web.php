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

define('g_captcha','6LdHBysUAAAAAH9DS78sb343bvx5OwMRJoX1VGC1');

Route::get('/admin-panel', function () {
//return 'djsf';
    return view('auth.login');
});
Route::get('/profile',[ 'as'=>'profile', function () {

    return view('profile');
}]);
Route::get('/dashboard',[ 'as'=>'dashboard', function () {

    return view('dashboard');
}]);

Route::get('/',['as'=>'main','middleware'=>'auth','uses'=> 'ProductsController@index']);
Route::post('purchase/{id}','ProductsController@purchase');

Route::post('submit-application','ApplicantsController@store');
Auth::routes();

Route::get('/home', 'ApplicantsController@data')->name('home');
Route::get('/product', 'ProductsController@data')->name('product');
Route::get('/view/{id}', 'ApplicantsController@view')->name('view');

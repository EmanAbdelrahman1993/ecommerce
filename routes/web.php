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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/category/index','CategoryController@index');
Route::resource('category','CategoryController');

Route::get('/products/index','ProductController@index');
Route::resource('products','ProductController');
Route::get('/products/{id}','ProductController@show');


Route::group(['middleware'=>['web','auth']], function(){

    Route::get('/', function(){
        return view('welcome');
    });
});
Route::get('/home', function(){
    if(Auth::user()->admin ==0)
    {
        return view('home');
    }
    else

        return view('dashboard');

});
Route::get('/userview', 'ProductController@userview');
Route::get('/payment', 'OrderDetailsController@orderNow');

Route::get('/User/cart','UserController@view_cart');

Route::post('/User/add_to_cart/{product_id}/', 'UserController@add_to_cart');



//Route::post('/login/custom',[
//
//    'uses' => 'LoginController@login',
//    'as'   => 'login.custom'
//
//]);
//Route::group(['middleware'=>'auth'], function() {
//
//    Route::get('/home', function () {
//        return view('home');
//    })->name('home');
//});
//
//
//Route::group(['middleware'=>'admin'], function() {
//    Route::get('/dashboard',function()
//    {
//        return view('dashboard');
//    })->name('dashboard');
////    Route::get('products','ProductController');
////    Route::get('category','CategoryController');
//});
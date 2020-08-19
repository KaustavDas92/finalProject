<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/dashboard', 'BackendController@index')->name('backend.index');
//Route::get('/home/{product}',function ()
//{
//   return view('website.frontend.product.product_details');
//});
Route::resource('/home','FrontendController');
Route::get('/cart','CartController@index')->name('cart.index');
Route::put('/cart/{cart}','CartController@update')->name('cart.update');
Route::delete('/cart/{cart}','CartController@destroy')->name('cart.destroy');
Route::post('/cart','CartController@store')->name('cart.store');
//Route::resource('/cart', 'CartController');
Route::resource('/orders','OrdersController');
Route::resource('/list','ListController');
Route::resource('/confirmation','ConfirmationController');
Route::resource('/cart/checkout','checkoutController');
Route::resource('/dashboard/productcategory','ProductCategoryController');
Route::resource('/dashboard/product','ProductController');
Route::resource('/dashboard/productimage','ProductImageController');
Route::resource('/dashboard/customerdetail','CustomerDetailController');
Route::resource('/dashboard/payment','PaymentController');
Route::resource('/contact','ContactController');
Route::resource('/dashboard/contactform','ContactFormController');

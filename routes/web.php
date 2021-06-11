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

// Route::get('/', function () {
//     return view('welcome');
// });

//client
Route::get('/', 'ClientController@home');
Route::get('/cart', 'ClientController@cart');
Route::get('/login', 'ClientController@login');
Route::get('/signup', 'ClientController@signup');
Route::get('/shop', 'ClientController@shop');
Route::get('/checkout', 'ClientController@checkout');
Route::get('/product_single', 'ClientController@product_single');
Route::post('/updateqty', 'ClientController@updateqty');
Route::get('/removeItem/{id}', 'ClientController@removeItem');
Route::get('client/product_single/{id}', 'ClientController@productsingle');
Route::post('postcheckout','ClientController@postcheckout');
//admin
Route::get('/admin', 'AdminController@dashboard');

Route::get('/addcategory', 'CategoryController@addcategory');
Route::post('/savecategory', 'CategoryController@savecategory');
Route::get('/category', 'CategoryController@category');
Route::get('/category', 'CategoryController@category');
Route::get('/edit-category/{id}', 'CategoryController@editcategory');
Route::get('/delete/{id}', 'CategoryController@delete');
Route::post('/updatecategory', 'CategoryController@updatecategory');


Route::get('/view_by_cat/{name}', 'CategoryController@view_by_cat');


Route::get('/addproduct', 'ProductController@addproduct');
Route::get('/product', 'ProductController@product');
Route::post('/saveproduct', 'ProductController@saveproduct');
Route::get('/edit-product/{id}', 'ProductController@editproduct');
Route::get('/delete-product/{id}', 'ProductController@deleteproduct');
Route::post('/updateproduct', 'ProductController@updateproduct');
Route::get('/activate-product/{id}', 'ProductController@activateproduct');
Route::get('/unactivate-product/{id}', 'ProductController@unactivateproduct');
Route::get('/addtocart/{id}', 'ProductController@addtocart');


Route::get('/slider', 'SliderController@slider');
Route::get('/addslider', 'SliderController@addslider');
Route::post('/saveslider', 'SliderController@saveslider');
Route::get('/edit-slider/{id}', 'SliderController@editslider');
Route::post('/updateslider', 'SliderController@updateslider');
Route::get('/delete-slider/{id}', 'SliderController@deleteslider');
Route::get('/activate-slider/{id}', 'SliderController@activateslider');
Route::get('/unactivate-slider/{id}', 'SliderController@unactivateslider');
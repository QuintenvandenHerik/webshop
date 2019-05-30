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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/shop', 'ProductController@index')->name('shop');
Route::get('/shop/category/{category}', 'ProductController@changeCategory')->name('shop.category');
Route::get('/shop/addToCart/{id}', 'ProductController@addToCart')->name('shop.addToCart');
Route::get('/cart', 'ProductController@cartIndex')->name('cart');
Route::get('/cart/removeFromCart/{id}', 'ProductController@removeFromCart')->name('cart.destroy');
Route::post('/cart/changeQuantity/{id}', 'ProductController@changeQuantity')->name('cart.quantity');
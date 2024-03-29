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

/*Route::get('/', function () {
    return view('welcome');
});*/

/* Product Routes */
Route::get('/', 'ProductController@index')->name('products.index');
Route::get('/boutique/{slug}', 'ProductController@show')->name('products.show');

/* Cart Routes */
Route::get('/panier', 'CartController@index')->name('cart.index');
Route::post('/panier/ajouter', 'CartController@store')->name('cart.store');
Route::patch('/panier/{rowId}', 'CartController@update')->name('cart.update');
Route::delete('/panier/{rowId}', 'CartController@destroy')->name('cart.destroy');
Route::get('/videpanier', function () {
    Cart::destroy();
});

/* Checkout Routes */
Route::get('/paiement', 'CheckoutController@index')->name('checkout.index');
Route::post('/paiement', 'CheckoutController@store')->name('checkout.store');
Route::get('/merci', 'CheckoutController@thankYou')->name('checkout.thankYou');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth','admin']], function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');;
    Route::resource('product','ProductCategoryController');
    Route::resource('category','CategoryController');
    Route::get('/orders', 'OrderController@index');



    });



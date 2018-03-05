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
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('auth/{social}', 'Auth\SocialAuthController@redirectToProvider')->name('socialAuth');
Route::get('auth/{social}/callback', 'Auth\SocialAuthController@handleProviderCallback');

Route::prefix('user')->group(function () {
    Route::resource('profile', 'User\UserController', ['only' => [
        'index',
        'update',
    ]]);
    Route::resource('password', 'User\PasswordController', ['only' => [
        'index',
        'update',
    ]]);
});

Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::resource('manage-product', 'ProductController', ['only' => [
        'index',
        'destroy',
        'edit',
        'store'
    ]]);
    Route::resource('update-detail', 'ImagesController', [ 'only' => [
        'show',
        'store',
    ]]);
    Route::get('add-product', 'AddProductsController@index')->name('add-product.index');
});

Route::namespace('Admin')->group(function () {
    Route::get('get/categories', 'CategoryController@getCategories')->name('getCategories');
    Route::resource('category', 'CategoryController');
    Route::get('add-product', 'AddProductsController@index')->name('add-product.index');
});

Route::get('detail-product/{id}', 'DetailProductController@show')->name('detailProduct');
Route::get('get/detail-color-product/{id}', 'DetailProductController@getDetailColorProduct')->name('getDetailColorProduct');
Route::prefix('cart')->group(function () {
    Route::get('show', 'ShoppingCartController@show')->name('cart.show');
    Route::post('add', 'ShoppingCartController@addCart')->name('cart.add');
    Route::post('remove', 'ShoppingCartController@removeCart')->name('cart.remove');
    Route::post('change-quantity', 'ShoppingCartController@changeQuantity')->name('cart.changeQuantity');
    Route::post('change-color', 'ShoppingCartController@changeColor')->name('cart.changeColor');
    Route::get('order', 'ShoppingCartController@order')->name('cart.order');
    Route::resource('order-address', 'OrderAddressController', ['only' => [
        'index',
        'update',
    ]]);
    Route::resource('order-payment', 'OrderPaymentController', ['only' => [
        'index',
        'store',
    ]]);
});

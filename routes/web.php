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

Route::prefix('user')->namespace('User')->group(function () {
    Route::resource('profile', 'UserController', ['only' => [
        'index',
        'update',
    ]]);
    Route::resource('password', 'PasswordController', ['only' => [
        'index',
        'update',
    ]]);
    Route::get('list-order', 'ListOrderController@index')->name('user.listOrder');
});

Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::resource('manage-product', 'ProductController');
    Route::resource('update-detail', 'ImagesController', [ 'only' => [
        'show',
        'store',
    ]]);
    Route::get('add-product', 'AddProductsController@index')->name('add-product.index');
    Route::resource('manage-order', 'OrderController');
});

Route::namespace('Admin')->group(function () {
    Route::get('get/categories', 'CategoryController@getCategories')->name('getCategories');
    Route::resource('category', 'CategoryController');
});

Route::prefix('product')->group(function () {
    Route::get('get/detail-color-product/{id}', 'DetailProductController@getDetailColorProduct')->name('getDetailColorProduct');
    Route::post('post/review', 'DetailProductController@addReview')->name('product.addReview');
    Route::get('detail/{id}', 'DetailProductController@show')->name('detailProduct');
    Route::get('search', 'SearchController@index')->name('product.search');
    Route::post('search/live', 'SearchController@liveSearch')->name('product.liveSearch');
});

Route::prefix('cart')->group(function () {
    Route::get('/', 'ShoppingCartController@show')->name('cart.show');
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



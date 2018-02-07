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

Route::prefix('admin')->group(function () {
    Route::resource('manage-product', 'Admin\ProductController', ['only' => [
        'index',
        'destroy',
        'edit',
    ]]);

    Route::get('add-product', 'Admin\AddProductsController@index')->name('add-product.index');
});

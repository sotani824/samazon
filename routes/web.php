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

Route::get('/', 'WebController@index');
  
Route::get('users/carts', 'CartController@index')->name('carts.index');
Route::post('users/carts', 'CartController@store')->name('carts.store');
Route::put('users/carts', 'CartController@update')->name('carts.update');
Route::delete('users/carts', 'CartController@destroy')->name('carts.destroy');
  
Route::get('users/mypage', 'UserController@mypage')->name('mypage');
Route::get('users/mypage/edit', 'UserController@edit')->name('mypage.edit');
Route::get('users/mypage/address/edit', 'UserController@edit_address')->name('mypage.edit_address');
Route::put('users/mypage', 'UserController@update')->name('mypage.update');
Route::get('users/mypage/favorite', 'UserController@favorite')->name('mypage.favorite');
Route::get('users/mypage/password/edit', 'UserController@edit_password')->name('mypage.edit_password');
Route::put('users/mypage/password', 'UserController@update_password')->name('mypage.update_password');
Route::delete('users/mypage/delete', 'UserController@destroy')->name('mypage.destroy');

Route::post('products/{product}/reviews', 'ReviewController@store');

Route::get('products/{product}/favorite', 'ProductController@favorite')->name('products.favorite');
Route::get('products', 'ProductController@index')->name('products.index');
Route::get('products/{product}', 'ProductController@show')->name('products.show');
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', 'DashboardController@index');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function() {
    Route::resource('major_categories', 'Dashboard\MajorCategoryController');
    Route::resource('categories', 'Dashboard\CategoryController');
    Route::resource('products', 'Dashboard\ProductController');
    Route::resource('users', 'Dashboard\UserController');
});

if (env('APP_ENV') === 'production') {
    URL::forceScheme('https');
}
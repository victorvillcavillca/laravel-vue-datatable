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
// Route::get('/user', 'HomeController@user')->name('user');
// Route::get('/category', 'CategoryController@index')->name('category');


Route::resource('users', 'UserController')->middleware('auth');
Route::resource('categories', 'CategoryController')->middleware('auth');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::view('/', 'admin.home');
    Route::view('home', 'admin.home')->name('admin');
    
    Route::get('categories/data', 'Admin\CategoryController@data');
	Route::resource('categories',  'Admin\CategoryController');
});
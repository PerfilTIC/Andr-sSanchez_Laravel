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

//General routes
Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

//User routes
//Route::get('/configuracion', 'UserController@config')->name('config');
//Route::post('/user/update', 'UserController@update')->name('user.update');
//Route::get('/user/avatar/{filename}', 'UserController@getImage')->name('user.avatar');
//Route::get('/perfil/{id}', 'UserController@profile')->name('user.profile');
//Route::get('/usuarios/{search?}', 'UserController@index')->name('user.index');

//Category routes
Route::get('/categoria/crear', 'CategoryController@create')->name('category.create');
Route::post('/categoria/save', 'CategoryController@save')->name('category.save');
//Product routes
Route::get('/producto/crear', 'ProductController@create')->name('product.create');
Route::post('/producto/save', 'ProductController@save')->name('product.save');
Route::get('/producto/file/{filename}', 'ProductController@getProduct')->name('product.file');
Route::get('/producto/{id}', 'ProductController@detail')->name('product.detail');
Route::get('/producto/delete/{id}', 'ProductController@delete')->name('product.delete');
Route::get('/producto/editar/{id}', 'ProductController@edit')->name('product.edit');
Route::post('/producto/update', 'ProductController@update')->name('product.update');

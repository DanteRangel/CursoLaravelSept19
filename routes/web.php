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

Route::get('hola2', 'ProductController@index');
Route::get('welcome', 'ProductController@show');
Route::group(['middleware' => 'auth'], function(){  
    Route::resource('products', 'ProductController');
    Route::resource('users', 'UserController');
    Route::resource('competencia', 'CompetenciaController');
    Route::group(['prefix' => 'admin'], function(){
        Route::resource('competencia', 'Admin\FormController');
    });
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

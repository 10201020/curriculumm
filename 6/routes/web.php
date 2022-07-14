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

Route::group(['prefix' => 'admin'], function() {
    Route::get('t/create', 'Admin\TController@add')->middleware('auth');
    Route::post('t/create', 'Admin\TController@create');
});
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('t/create', 'Admin\TController@add');
    Route::post('t/create', 'Admin\TController@create'); # 追記
});
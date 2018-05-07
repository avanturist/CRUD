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
Route::get('/',['uses'=>'IndexController@index']);

Auth::routes();

Route::group(['prefix'=>'admin'], function(){
    Route::get('/', ['uses'=>'Admin\CompaniesController@getAdmin']);
    Route::resource('/companies', 'Admin\CompaniesController');
});
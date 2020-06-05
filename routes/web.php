<?php

use Illuminate\Support\Facades\Route;

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
    return view('admin');
});

Route::get('login','LoginController@getLogin')->name('login');
Route::post('login','LoginController@Authentication')->name('authentication');

Route::group(['prefix'=>'admin'],function(){
    Route::group(['prefix'=>'nguoi-dung'],function(){
        Route::get('/','UserController@getUser')->name('admin.nguoidung');
        Route::post('/add','UserController@addUser')->name('admin.nguoidung.add');
    });
});
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
    Route::group(['prefix'=>'khu-vuc'],function(){
        Route::get('/','KhuVucController@getArea')->name('admin.area');
        Route::get('/quan-ly/{id}','KhuVucController@manageArea')->name('admin.manageArea');
        Route::post('/add','KhuVucController@addArea')->name('admin.area.add');
        Route::post('/edit/{id}','KhuVucController@editArea')->name('admin.area.edit');
        Route::get('/delete/{id}','KhuVucController@deleteArea')->name('admin.area.delete');
    });
    Route::group(['prefix'=>'ban'],function(){
        Route::post('/add','KhuVucController@addBan')->name('admin.manageArea.add');
        Route::post('/edit/{id}','KhuVucController@editBan')->name('admin.manageArea.edit');
        Route::get('/delete/{id}','KhuVucController@deleteBan')->name('admin.manageArea.delete');
    });
    Route::group(['prefix'=>'mat-hang'],function(){
        Route::get('/','MatHangController@getProd')->name('admin.prod');
        Route::get('/add','MatHangController@prodAddUI')->name('admin.prod.add-ui');
        Route::post('/add','MatHangController@prodAdd')->name('admin.prod.add');
        Route::get('/edit/{id}','MatHangController@prodEditUI')->name('admin.prod.edit-ui');
        Route::post('/edit/{id}','MatHangController@prodEdit')->name('admin.prod.edit');
        Route::get('/delete/{id}','MatHangController@delProd')->name('admin.prod.delete');
    });
    Route::group(['prefix'=>'hinh-anh'],function(){
        Route::get('/mh/{id}','CustomController@deleteHAMH')->name('admin.hinhanhmathang.delete');
    });
    Route::group(['prefix'=>'phan-cong'],function(){
        Route::get('/','PhanCongController@getCalendar')->name('admin.phancong');
        Route::post('/add','PhanCongController@addPhanCong')->name('admin.phancong.add');
        Route::post('/edit','PhanCongController@editPhanCong')->name('admin.phancong.edit');
        Route::post('/delete','PhanCongController@deletePhanCong')->name('admin.phancong.delete');
    });
    Route::group(['prefix'=>'order'],function(){
        Route::get('/','OrderController@getOrder')->name('admin.order');
        Route::post('/','OrderController@Order')->name('admin.order.datban');
    });

});
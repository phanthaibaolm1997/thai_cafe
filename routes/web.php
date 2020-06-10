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
})->name('admin');

Route::get('login','LoginController@getLogin')->name('login');
Route::post('login','LoginController@Authentication')->name('authentication');
Route::get('logout','LoginController@logout')->name('logout');

Route::group(['prefix'=>'admin'],function(){
    Route::group(['prefix'=>'nguoi-dung'],function(){
        Route::get('/','UserController@getUser')->name('admin.nguoidung');
        Route::get('/luong','UserController@userSalary')->name('admin.nguoidung.luong');
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
        Route::get('/update-quality','OrderController@orderUpdateQuality')->name('admin.order.updateNum');
        Route::get('/delete-mathang','OrderController@orderdelMH')->name('admin.order.delMH');
        Route::post('/','OrderController@Order')->name('admin.order.datban');
        Route::get('/addNew','OrderController@addOrder')->name('admin.order.addNew');
        Route::post('/checkout','OrderController@checkOut')->name('admin.order.checkout');
    });
    Route::group(['prefix'=>'vai-tro'],function(){
        Route::get('/','UserController@getVaiTro')->name('admin.vaitro');
        Route::post('/edit/{id}','UserController@editVaiTro')->name('admin.vaitro.edit');
        Route::post('/add','UserController@createVT')->name('admin.vaitro.add');
        Route::post('/luong/edit/{id}','UserController@editLuong')->name('admin.luong.edit');
        Route::post('/luong/add','UserController@createLuong')->name('admin.luong.add');
    });
    Route::group(['prefix'=>'nguyen-lieu'],function(){
        Route::get('/','CustomController@indexNL')->name('admin.nguyenlieu');
        Route::post('/edit/{id}','CustomController@editNL')->name('admin.nguyenlieu.edit');
        Route::post('/add','CustomController@createNL')->name('admin.nguyenlieu.add');
        Route::post('/ncc/edit/{id}','CustomController@editNCC')->name('admin.ncc.edit');
        Route::post('/ncc/add','CustomController@createNCC')->name('admin.ncc.add');
        Route::post('/loai/edit/{id}','CustomController@editLoai')->name('admin.loai.edit');
        Route::post('/loai/add','CustomController@createLoai')->name('admin.loai.add');
    });

});
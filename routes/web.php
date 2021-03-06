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
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin_dashboard', 'AdminController@index')->middleware('role:1');
Route::get('/warung_dashboard', 'WarungController@index')->middleware('role:2');
Route::get('/customer_dashboard', 'CustomerController@index')->middleware('role:3');
Route::get('/tentang', function () {
    return view('layoutCustomer.tentang');
})->middleware('role:3');
Route::get('/daftar-menu', 'MenuController@index');
Route::resource('menu','MenuController');
Route::post('/tambahMenuBaru','MenuController@tambahMenuBaru');
Route::get('/menu/{Menu}/delete','MenuController@destroy');
Route::get('/menu/{Menu}/edit','MenuController@edit');
Route::post('/menu/{Menu}/update','MenuController@update');
Route::get('/stok_meja','WarungController@jumlahtable');
Route::get('/pemesanan','WarungController@pemesanan');
Route::resource('transaksi','TransaksiController');
Route::get('/stok_meja/{no_meja}','TransaksiController@emptyItMeja');
Route::get('/data-pesanan','TransaksiController@dataPesanan');
Route::get('/profile','WarungController@profile');
Route::get('/data_warung','AdminController@warung');
Route::post('/warung/create','AdminController@create');
Route::get('/data_customer','AdminController@customer');
Route::get('/profile_customer','CustomerController@profile');
Route::get('/pesan_menu','CustomerController@pesanmenu');

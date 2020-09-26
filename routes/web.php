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
    return view('welcome');
});

Route::get('/testview', function () {
    return view('test');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//view produk
Route::get('/admin/produks/>/{id}', 'ProdukController@kategoriviewproduk');
Route::get('/data-check/{id}', 'ProdukController@viewdataproduk'); //api produk

//pengunjung
Route::get('/admin/akun_pengunjung', 'PengunjungController@index');
Route::get('/akun_pengunjung', 'PengunjungController@datapengunjung');//api penunjung
Route::get('/detail-produk/{id}', 'PengunjungController@detailproduk');
Route::get('/beli-produk/{id}', 'PengunjungController@beliproduk');
Route::get('/keranjang', 'PengunjungController@keranjang');
Route::post('/keranjang/update/{id}', 'PengunjungController@updateker');
Route::get('/keranjang/delete/{id}', 'PengunjungController@deleteker');
Route::get('/keranjang/checkout', 'PengunjungController@checkout');
Route::get('/keranjang/checkout/view', 'PengunjungController@checkoutview');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

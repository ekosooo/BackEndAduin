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

Route::get('/login', 'LoginController@index')->name('login.login');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::post('/postlogin', 'LoginController@postlogin')->name('login.postlogin');


Route::group(['middleware' => 'auth'], function(){

    Route::get('/dashboard', 'DashboardController@index')->name('master.dashboard');
    Route::resource('barang', 'BarangController');
    Route::get('/searchbarang', 'BarangController@search')->name('barang.search');
    Route::resource('ruangan', 'RuanganController');
    Route::get('/searchruangan', 'RuanganController@search')->name('ruangan.search');

    Route::resource('pengaduan', 'PengaduanController');

    Route::resource('admin', 'UserController');
    Route::get('/register/admin', 'UserController@registeradmin')->name('admin.register');
    Route::get('/register/pengadu', 'PengaduController@registerpengadu')->name('pengadu.register');

    Route::get('/searchpengaduan', 'PengaduanController@search')->name('pengaduan.search');
    Route::resource('pengadu', 'PengaduController');
    Route::get('/searchpengadu', 'PengaduController@search')->name('pengadu.search');

    Route::get('/aktifasi/{id}', 'PengaduController@aktifasi')->name('pengadu.aktifasi');
});

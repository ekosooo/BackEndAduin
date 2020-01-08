<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'cors'], function(){

Route::post('/register', 'PengaduController@register');
Route::post('/login', 'PengaduController@login');
Route::post('post', 'PengaduanController@post');
Route::get('pengadu', 'PengaduController@pengadu');
Route::get('pengadu/{id}', 'PengaduController@profileById');
Route::get('barang', 'BarangController@barang');
Route::get('ruangan', 'RuanganController@ruangan');

});


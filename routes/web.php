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
Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index');
    Route::resource('user', 'UserController');
    Route::resource('kabupaten', 'KabupatenController');
    Route::resource('kecamatan', 'KecamatanController');
    Route::resource('kelurahan', 'KelurahanController');
    Route::resource('tps', 'TpsController');
    Route::resource('paslon', 'PaslonController');
    Route::resource('saksi', 'SaksiController');
    Route::resource('perhitungan', 'PerhitunganController');
    Route::get('/datakecamatan', 'KecamatanController@data');

    Route::get('/unread', 'InboxController@unread')->name('inbox.unread');

    Route::get('/kecamatandetai', 'KecamatanController@detail')->name('kecamatan.detail');
    Route::get('/kelurahandetai', 'KelurahanController@detail')->name('kelurahan.detail');

    Route::resource('inbox', 'InboxController');
});


Route::get('/receive', 'InboxController@receive');

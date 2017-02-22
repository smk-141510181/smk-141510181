<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');

Auth::routes();

Route::resource('/admin' ,'AdminSuperController');
Route::resource('/golongan','GolonganController');
Route::resource('/jabatan','JabatanController');
Route::resource('/pegawai','PegawaiController');
Route::resource('/kategorilembur','KategoriLemburController');
Route::resource('/lembur','LemburPegawaiController');
Route::resource('/penggajian','PenggajianController');
Route::resource('/tunjanganpegawai','PegawaiTunjanganController');
Route::get('/createerror1','LemburPegawaiController@error');
Route::get('/createerror','PegawaiTunjanganController@createerror');
Route::get('/editerror','PegawaiTunjanganController@editerror');
Route::resource('/tunjangan','TunjanganController');
Route::get('pageAksesKhusus', function(){
	return view('pageAksesKhusus');
});
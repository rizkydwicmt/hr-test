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

/* Admin */
Route::get('/', 'DashboardController@index');

/* API */
Route::get('api/pegawai/list', 'PegawaiController@list');
Route::get('api/pegawai/cuti/list', 'PegawaiController@get_ambil_cuti');
Route::get('api/pegawai/cuti/list_lebih', 'PegawaiController@get_ambil_cuti_lebih');
Route::get('api/pegawai/list/{count}', 'PegawaiController@list_limit');
Route::post('api/pegawai/add', 'PegawaiController@create');
Route::post('api/pegawai/edit', 'PegawaiController@update');
Route::post('api/pegawai/delete/{id}', 'PegawaiController@delete');

Route::get('api/cuti/list', 'CutiController@list');
Route::post('api/cuti/add', 'CutiController@create');
Route::post('api/cuti/edit', 'CutiController@update');
Route::post('api/cuti/delete/{id}', 'CutiController@delete');
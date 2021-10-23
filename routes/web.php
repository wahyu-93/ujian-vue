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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('/{any}', 'home');

Route::get('/ujian/siswa', 'UjianController@index')->name('ujian.index');
Route::post('/ujian/siswa', 'UjianController@store')->name('ujian.submit');

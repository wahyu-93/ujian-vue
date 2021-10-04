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

// soal
Route::resource('/soal', 'Api\Soal\SoalController')->except(['create', 'edit']);

// peraturan
Route::get('/peraturan', 'Api\Peraturan\PeraturanController@index')->name('peraturan.index');
Route::put('/peraturan/{id}', 'Api\Peraturan\PeraturanController@update')->name('peraturan.update');

// user 
Route::resource('/user', 'Api\User\UserController')->except(['create', 'edit']);

// login 
Route::post('/masuk', 'Api\User\UserController@login')->name('masuk');

// nilai
Route::get('/nilai', 'Api\Nilai\NilaiController@index')->name('nilai.index');
Route::get('/nilai/{id}', 'Api\Nilai\NilaiController@show')->name('nilai.show');
Route::get('/dashboard', 'Api\Nilai\NilaiController@dashboard')->name('nilai.dashboard');
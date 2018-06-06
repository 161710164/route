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

Route::get('index', function () {
    return view('layouts.admin');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('artikel','ArtikelController');
Route::resource('kategori', 'KategoriController');
Route::resource('fasilitas', 'FasilitasController');
Route::resource('guru', 'GuruController');
Route::resource('ekskul', 'EkskulController');

Route::group(['prefix'=>'admin', 'Middleware'=>['auth', 'role:admin']],
function () {
    Route::resource('artikel','ArtikelController');
});

Route::group(['prefix'=>'member', 'Middleware'=>['auth', 'role:member']],
function () {
    Route::resource('artikel','ArtikelController');
});
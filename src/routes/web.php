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


Route::prefix('/admin')->group(function () {
    Route::get('/login', 'Admin\LoginController@index')->name('admin.login.index');
    Route::post('/login', 'Admin\LoginController@login')->name('admin.login.login');
    Route::get('/logout', 'Admin\LoginController@logout')->name('admin.login.logout');
});
// 管理者（administratorsテーブル）未認証の場合にログインフォームに強制リダイレクトさせるミドルウェアを設定する。  
Route::prefix('/admin')->middleware('auth:administrators')->group(function () {
    Route::get('/', 'Admin\IndexController@index')->name('admin');
    Route::get('/big_edit', 'HomeController@big_edit')->name('big_edit');
    Route::post('/big_update/{id}', 'HomeController@big_update')->name('big_update');
    Route::post('/big_store', 'HomeController@big_store')->name('big_store');
    Route::get('/q_edit/{id}', 'HomeController@q_edit')->name('q_edit');
    Route::post('/q_update/{id}', 'HomeController@q_update')->name('q_update');
    Route::post('/q_store/{id}', 'HomeController@q_store')->name('q_store');
});



// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'HomeController@index')->name('index');
Route::get('/quiz/{id}', 'HomeController@quiz')->name('quiz');
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();
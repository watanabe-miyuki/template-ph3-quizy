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
// ログインここから

Route::prefix('admin')->group(function () {
    Route::get('/login', 'Admin\LoginController@index')->name('admin.login.index');
    Route::post('/login', 'Admin\LoginController@login')->name('admin.login.login');
    Route::get('/logout', 'Admin\LoginController@logout')->name('admin.login.logout');
});
// 管理者（administratorsテーブル）未認証の場合にログインフォームに強制リダイレクトさせるミドルウェアを設定する。  
Route::prefix('/admin')->middleware('auth:administrators')->group(function () {
    Route::get('/', 'Admin\IndexController@index')->name('admin.index');
    // ここにブロックしたいもの入れる
});



Route::get('/', function () {
    return view('welcome');
});
// Route::get('/', 'HomeController@index')->name('index');
Route::get('/quiz/{id}', 'HomeController@quiz')->name('quiz');
Route::get('/admin/add', 'HomeController@big_add')->name('big_add');
Route::get('/admin/add/{id}', 'HomeController@add')->name('add');
Route::get('/admin/edit/{id}', 'HomeController@edit')->name('edit');
Route::get('/admin/delete/{id}', 'HomeController@delete')->name('delete');
// Route::get('/upload', 'HomeController@upload')->name('upload');
Route::post('/store/{id}', 'HomeController@store')->name('store');
Route::post('/update/{id}', 'HomeController@update')->name('update');
Route::post('/store', 'HomeController@big_store')->name('big_store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

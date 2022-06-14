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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'HomeController@index')->name('index');
Route::get('/quiz/{id}', 'HomeController@quiz')->name('quiz');
Route::get('/admin', 'HomeController@admin')->name('admin');
Route::get('/admin/add', 'HomeController@big_add')->name('big_add');
Route::get('/admin/add/{id}', 'HomeController@add')->name('add');
Route::get('/admin/edit/{id}', 'HomeController@edit')->name('edit');
Route::get('/admin/delete/{id}', 'HomeController@delete')->name('delete');
// Route::get('/upload', 'HomeController@upload')->name('upload');
Route::post('/store/{id}','HomeController@store')->name('store');
Route::post('/update/{id}','HomeController@update')->name('update');
Route::post('/store','HomeController@big_store')->name('big_store');
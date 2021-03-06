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

Route::resource('report', 'DailyReportController');
Route::resource('message', 'MessageController');
Route::post('message/message', 'MessageController@message')->name('message');
Route::get('/result/ajax', 'MessageController@getData');

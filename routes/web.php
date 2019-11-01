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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/go', 'HomeController@go')->name('go');

Route::resource('/orders', 'Order\OrderController');
Route::get('/orders/{order}/payflow', 'FlowController@payOrder')->name('orders.payflow');

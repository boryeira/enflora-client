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
Route::get('/profile', 'User\UserController@profile')->name('auth.profile');
Route::get('/password', 'User\UserController@passwordUpdate')->name('auth.password');
Route::get('/prescription', 'User\PrescriptionController@show')->name('prescription.show');
Route::post('/prescription', 'User\PrescriptionController@store')->name('prescription.store');
// Route::get('/go', 'HomeController@go')->name('go');

Route::resource('/orders', 'Order\OrderController');
Route::get('/orders/{order}/payflow', 'Flow\FlowController@payOrder')->name('orders.payflow');

Route::post('/flow/return', 'Flow\FlowController@orderReturn')->name('orders.returnflow');
Route::post('/flow/confirm', 'Flow\FlowController@orderConfirm')->name('orders.confirmflow');






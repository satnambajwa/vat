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
//Auth::routes();


Route::get('/', function (){return view('welcome');});
Route::get('/dashboard', 'Users@index');
Route::get('/invoices', 'Users@invoices');
Route::get('/invoice', 'Users@invoice');
Route::get('invoice/{id}', 'Users@editInvoice');
Route::get('/invoice1', 'Users@invoice');
Route::get('/quotes', 'Users@quotes');
Route::get('/sales-overview', 'Users@salesOverview');
Route::get('/bills-to-pay', 'Users@billsToPay');
Route::get('/purchase-order', 'Users@purchaseOrder');
Route::get('/purchase-overview', 'Users@purchaseOverview');
Route::get('/expense', 'Users@expense');
Route::get('/product', 'Users@product');
Route::get('/client', 'Users@client')->name('client');

Route::get('get-data-my-datatables/{type}', ['as'=>'get.data','uses'=>'Users@getData']);//->middleware(['invoice_data']);;

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
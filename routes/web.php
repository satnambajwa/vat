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
Route::get('/invoices', 'Users@invoices')->name('invoices');

Route::get('/invoice', 'Users@create');
Route::get('/purchase', 'Users@create');

Route::get('/invoice/{id}', 'Users@invoice');
Route::get('/invoice1/{id}', 'Users@invoice1');

Route::post('/invoices', 'Users@store')->name('store');
Route::post('/update/{id}', 'Users@update')->name('update');

Route::get('/quotes', 'Users@quotes');
Route::get('/sales-overview', 'Users@salesOverview');
Route::get('/bills-to-pay', 'Users@billsToPay');
Route::get('/purchase-order', 'Users@purchaseOrder');
Route::get('/expense', 'Users@expense');
Route::get('/product', 'Users@product');
Route::get('/client', 'Users@client')->name('client');



Route::get('/contacts', 'Users@contacts')->name('contacts');
Route::get('/contact', 'Users@contact')->name('contact');
Route::get('/contact/{id}', 'Users@contact')->name('contact');
Route::post('/cupdate', 'Users@contactUpdate')->name('cupdate');
//Route::post('/cupdate/{id}', 'Users@contactUpdate')->name('cupdate');
Route::get('get-data-my-datatables/{type}', ['as'=>'get.data','uses'=>'Users@getData']);



Route::get('/advanced', 'Setting@advanced')->name('advanced');
Route::get('/taxRate', 'Setting@taxRate')->name('taxRate');
Route::get('/accounts', 'Setting@accounts')->name('accounts');
Route::get('/financial', 'Setting@financial')->name('financial');
Route::get('/conversion', 'Setting@conversion')->name('conversion');
Route::get('/asset', 'Setting@assets')->name('asset');


Route::get('/tax', 'Setting@tax')->name('tax');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
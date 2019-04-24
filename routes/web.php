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
Route::get('/profile', 'Users@profile');
Route::get('/company/{id?}', 'Users@company')->name('company');
Route::get('/companies', 'Users@companies')->name('companies');
Route::post('/compSave', 'Users@companySave')->name('compSave');

Route::get('/invoices', 'Users@invoices')->name('invoices');
Route::get('/invoice', 'Users@create');
Route::get('/invoice/{id}', 'Users@invoice');

Route::get('/quotes', 'Users@quotes')->name('quotes');
Route::get('/quote/{id}', 'Users@quote');
Route::get('/quote', 'Users@create');

Route::get('/purchases', 'Users@purchases')->name('purchases');
Route::get('/purchase/{id}', 'Users@purchase');
Route::get('/purchase', 'Users@create');

Route::post('/update/{id?}', 'Users@update')->name('update');

Route::get('/products', 'Users@items')->name('products');

Route::get('/item/{id?}', 'Users@item')->name('item');
Route::post('/itemsave}', 'Users@itemSave')->name('itemsave');

Route::get('/overview/{type}', 'Users@overview');

Route::get('/contacts', 'Users@contacts')->name('contacts');
Route::get('/contact/{id?}', 'Users@contact')->name('contact');
Route::post('/cupdate', 'Users@contactUpdate')->name('cupdate');
Route::get('/payments', 'Users@payments')->name('payments');
Route::get('/payment/{id?}', 'Users@payment')->name('payment');
Route::post('/sPayment', 'Users@savePayment')->name('sPayment');


Route::get('get-data-my-datatables/{type}/{view}', ['as'=>'get.data','uses'=>'Users@getData']);

Route::get('/bills', 'Users@bills')->name('bills');
Route::get('/bill/{id}', 'Users@bill');
Route::get('/expense/{id}', 'Users@expense');
Route::get('/expenses', 'Users@expenses')->name('expenses');

Route::get('/advanced', 'Setting@advanced')->name('advanced');

Route::get('/accounts', 'Setting@accounts')->name('accounts');
Route::get('/ajaxAccountData', 'Setting@ajaxAccountData')->name('ajaxAccountData');
Route::post('/account-save', 'Setting@accountSave')->name('account-save');


Route::post('/noteSave', 'Users@noteSave')->name('noteSave');


Route::get('/taxRate', 'Setting@taxRate')->name('taxRate');
Route::post('/tax-save', 'Setting@taxSave')->name('tax-save');
Route::get('/ajaxTaxData', 'Setting@ajaxTaxData')->name('ajaxTaxData');



Route::get('/financial', 'Setting@financial')->name('financial');
Route::get('/conversion', 'Setting@conversion')->name('conversion');
Route::get('/asset', 'Setting@assets')->name('asset');
Route::get('/tax', 'Setting@tax')->name('tax');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/client', 'Users@client')->name('client');


Route::get('generate-pdf','ReportsController@generatePDF');
Route::get('/reports', 'ReportsController@index');
Route::get('/balance-sheet', 'ReportsController@balanceSheet')->name('balance-sheet');
Route::get('/cash-summary', 'ReportsController@cashSummary')->name('cash-summary');
Route::get('/profit-loss', 'ReportsController@profitLoss')->name('profit-loss');


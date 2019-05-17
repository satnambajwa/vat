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
Route::get('/site', function (){return view('welcome');})->name('site');

Route::get('/dashboard', ['uses'=>'Users@index']);
Route::get('/profile', ['uses'=>'Users@profile','middleware'=>'roles','roles'=>['Admin','User']]);
Route::get('/company/{id?}',['uses'=> 'Users@company','as'=>'company','middleware'=>'roles','roles'=>['Admin','User']]);
Route::get('/companies', ['uses'=> 'Users@companies','as'=>'companies','middleware'=>'roles','roles'=>['Admin','User']]);
Route::post('/compSave', 'Users@companySave')->name('compSave');

Route::get('/invoices', 'Users@invoices')->name('invoices');
Route::get('/quotes', 'Users@quotes')->name('quotes');
Route::get('/purchases', 'Users@purchases')->name('purchases');
Route::get('/bills', 'Users@bills')->name('bills');
Route::get('/expenses', 'Users@expenses')->name('expenses');

Route::get('/invoice', 'Users@create')->name('invoice');
Route::get('/quote', 'Users@create')->name('quote');
Route::get('/purchase', 'Users@create')->name('purchase');
Route::get('/bill', 'Users@create')->name('bill');
Route::get('/expense', 'Users@create')->name('expense');

Route::get('/invoice/{id}', 'Users@invoice');
Route::get('/purchase/{id}', 'Users@invoice');
Route::get('/quote/{id}', 'Users@invoice');
Route::get('/bill/{id?}', 'Users@invoice');
Route::get('/expense/{id}', 'Users@invoice');

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
Route::get('/advanced', 'Setting@advanced')->name('advanced');
Route::get('/accounts', 'Setting@accounts')->name('accounts');
Route::get('/ajaxAccountData', 'Setting@ajaxAccountData')->name('ajaxAccountData');
Route::post('/account-save', 'Setting@accountSave')->name('account-save');
Route::post('/noteSave', 'Users@noteSave')->name('noteSave');
Route::post('/addContact', 'Users@addContact')->name('addContact');



Route::get('/taxRate', 'Setting@taxRate')->name('taxRate');
Route::post('/tax-save', 'Setting@taxSave')->name('tax-save');
Route::get('/ajaxTaxData', 'Setting@ajaxTaxData')->name('ajaxTaxData');
Route::get('/financial', 'Setting@financial')->name('financial');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/client', 'Users@client')->name('client');
Route::get('generate-pdf','ReportsController@generatePDF');
Route::get('/reports', 'ReportsController@index');
Route::get('/balance-sheet', 'ReportsController@balanceSheet')->name('balance-sheet');
Route::get('/tax-report', 'ReportsController@taxReport')->name('tax-report');
Route::get('/cash-summary', 'ReportsController@cashSummary')->name('cash-summary');
Route::get('/profit-loss', 'ReportsController@profitLoss')->name('profit-loss');




Route::get('api','Users@api')->name('api');
Route::get('satnam', 'Users@apiresponse')->name('satnam');
Route::get('vatTax','Users@vatTax')->name('vatTax');



Route::get('export', 'ExcelController@export')->name('export');
Route::get('importExportView', 'ExcelController@importExportView');
Route::post('import', 'ExcelController@import')->name('import');

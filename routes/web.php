<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {return view('welcome');})->name('home');
Route::get('/home', function () {return view('welcome');})->name('home');
Auth::routes();

Route::resource('/entradas', 'EntradasController')->middleware('auth');
Route::resource('/customers', 'CustomersController');
Route::resource('/suppliers', 'SuppliersController');
Route::resource('/carriers', 'CarriersController');

//options para los selects
Route::get('/get-options-customers', 'CustomersController@getOptions');
Route::get('/get-options-suppliers', 'SuppliersController@getOptions');
Route::get('/get-options-carriers', 'CarriersController@getOptions');
//Route::get('/home', 'HomeController@index')->name('home');

//upload files
Route::post('/uploadfile', 'FilesEmails@uploadfile');
Route::get('/adjutos/entrada/{dir}/{filename}', 'FilesEmails@downloadFile');
Route::get('/adjutos-delete/entrada/{dir}/{filename}', 'FilesEmails@deleteFile');

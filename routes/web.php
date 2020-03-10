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

Route::get('/', 'DashboardController@index');
Route::get('/certificate', 'CertificateController@index')->name('certificate.all');
Route::get('/certificate/add', 'CertificateController@add');
Route::post('/certificate/add', 'CertificateController@add');
Route::get('/certificate/edit/{id}', 'CertificateController@edit');
Route::post('/certificate/update', 'CertificateController@update');
Route::get('/certificate/delete/{id}', 'CertificateController@delete');

Route::get('/account', 'AccountController@index')->name('account.all');
Route::get('/account/add', 'AccountController@add');
Route::post('/account/add', 'AccountController@add');
Route::get('/account/edit/{id}', 'AccountController@edit');
Route::post('/account/update', 'AccountController@update');
Route::get('/account/delete/{id}', 'AccountController@delete');
Route::get('/account/lock/{id}/{value}', 'AccountController@lock');
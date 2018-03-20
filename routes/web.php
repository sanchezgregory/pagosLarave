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

// Usuarios

Route::get('/usuarios', 'UserController@index')->name('user.index');

Route::get('/usuarios/create', 'UserController@create')->name('user.create');

Route::post('/usuarios/create', 'UserController@store')->name('user.store');

Route::get('/usuarios/detalles/{id}/', 'UserController@show')->where('id','\d+')->name('user.show'); // se asegura de los id sean numeros, y pueden ser mas de un digito

Route::get('usuarios/delete/{id}', 'UserController@delete')->where('id', '\d+')->name('user.delete');

Route::get('/usuarios/{id}/edit', 'UserController@edit')->name('user.edit');

Route::post('/usuarios/{id}/edit', 'UserController@update')->name('user.update');

Route::post('/usuarios/{id}/favorites', 'UserController@favorite')->name('user.favorite');

// Pagos

Route::get('/pagos/create', 'PaymentController@create')->name('payment.create');

Route::post('/pagos/create', 'PaymentController@store')->name('payment.store');
Route::get('/pagos', 'PaymentController@index')->name('payment.index');

Route::get('/pagos/detalles/{id}', 'PaymentController@show')->where('id','\d+')->name('payment.show'); // se asegura de los id sean numeros, y pueden ser mas de un digito;

Route::get('/pagos/{id}/edit', 'PaymentController@edit')->where('id','\d+')->name('payment.edit'); // se asegura de los id sean numeros, y pueden ser mas de un digito;;
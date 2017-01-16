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

Route::get('/', 'PersonaController@index')->name('index');

Route::resource('persona', 'PersonaController', ['except' => ['index'] ]);

Route::group(['prefix' => 'verify'], function () {
    Route::post('cedula', 'PersonaController@existCedula')->name('persona.cedula');
    Route::post('email', 'PersonaController@existEmail')->name('persona.email');
});

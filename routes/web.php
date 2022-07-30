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



Route::resource('/','EmpleadoController');
// Route::get('/concept_detail/{id}/create','ConceptController@conceptField')->name('concept_detail.create');
Route::get('/{id}/edit','EmpleadoController@edit')->name('empleado.edit');
Route::delete('/{id}/delete','EmpleadoController@destroy')->name('empleado.destroy');
Route::post('/{id}/update','EmpleadoController@update')->name('empleado.update');



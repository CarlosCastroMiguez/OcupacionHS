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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/calendario', 'EventoController@index');


Route::group(['middleware' => 'admin', 'namespace' => 'Admin'], function () {
    
    //Eventos
    
    //Asignaturas
    Route::get('/asignaturas','AsignaturaController@index');
    Route::post('/asignaturas','AsignaturaController@store');
    Route::get('/asignaturas/{id}','AsignaturaController@edit');
    Route::post('/asignaturas/{id}','AsignaturaController@update');
    Route::get('/asignaturas/{id}/eliminar','AsignaturaController@delete');

    
    
});

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

//calendario -> Admin & client
Route::get('/calendario', 'EventoController@calendar');

//Ver eventos-> Admin & client
Route::get('/eventos','EventoController@index');
Route::get('/ver/{id}','EventoController@show');


//rutas que requieren ser admin.
Route::group(['middleware' => 'admin'], function () {
    
    //Eventos
    Route::get('/crearevento','EventoController@create');
    Route::post('/crearevento','EventoController@store');
    Route::get('/eventos/{id}','EventoController@edit');
    Route::post('/eventos/{id}','EventoController@update');
    Route::get('/eventos/{id}/eliminar','EventoController@delete');
});

//rutas que requieren ser admin y estan en \Admin:
Route::group(['middleware' => 'admin', 'namespace' => 'Admin'], function () {
    
   //Asignaturas
    Route::get('/asignaturas','AsignaturaController@index');
    Route::post('/asignaturas','AsignaturaController@store');
    Route::get('/asignaturas/{id}','AsignaturaController@edit');
    Route::post('/asignaturas/{id}','AsignaturaController@update');
    Route::get('/asignaturas/{id}/eliminar','AsignaturaController@delete');
    
    //Salas
    Route::get('/salas','SalaController@index');
    Route::post('/salas','SalaController@store');
    Route::get('/salas/{id}','SalaController@edit');
    Route::post('/salas/{id}','SalaController@update');
    Route::get('/salas/{id}/eliminar','SalaController@delete');

    //TiposSala
    
    //Profesor
    Route::get('/profesores','ProfesorController@index');
    Route::post('/profesores','ProfesorController@store');
    Route::get('/profesores/{id}','ProfesorController@edit');
    Route::post('/profesores/{id}','ProfesorController@update');
    Route::get('/profesores/{id}/eliminar','ProfesorController@delete');
    
    //Simulador y Tipo sala
    Route::get('/otros','SimuladorController@index');
    
    //Simulador
    Route::post('/simuladores','SimuladorController@store');
    Route::post('/simuladores/editar','SimuladorController@update');
    Route::get('/simuladores/{id}/eliminar','SimuladorController@delete');
    
    //Tipo Sala
    Route::post('/tiposala','TipoSalaController@store');
    Route::post('/tiposala/editar','TipoSalaController@update');
    Route::get('/tiposala/{id}/eliminar','TipoSalaController@delete');
    
});

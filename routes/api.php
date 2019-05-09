<?php

use Illuminate\Http\Request;

//api/resources/salas
Route::get ('/resources/salas', 'ApiController@salas');

//asignaturas para un grado concreto.
//api/asignaturas/{grado_val}
Route::get ('/asignaturas/{grad}', 'ApiController@byAsignatura');

//Grupos para un grado y asignatura concretos.
//api/grupos/{grado_val}/{asignatura_val}
Route::get ('/asignaturas/{grad}/{asig}', 'ApiController@byGrupo');

//id para una asignatura concreta
//api/id/{grado_val}/{asignatura_val}/{grup_val}
Route::get ('/id/{grad}/{asig}/{grup}', 'ApiController@idAsignatura');

//api/simuladores
Route::get ('/simuladores', 'ApiController@simuladores');

//api/eventosFisioterapia/calendar
Route::get ('/eventosFisioterapia/calendar', 'ApiController@eventosFisioterapia');

//api/eventosEnfermeria/calendar
Route::get ('/eventosEnfermeria/calendar', 'ApiController@eventosEnfermeria');

//api/eventosFarmacia/calendar
Route::get ('/eventosFarmacia/calendar', 'ApiController@eventosFarmacia');

//api/eventosMedicina/calendar
Route::get ('/eventosMedicina/calendar', 'ApiController@eventosMedicina');

//api/eventosOdontologia/calendar
Route::get ('/eventosOdontologia/calendar', 'ApiController@eventosOdontologia');

//api/eventosPsicologia/calendar
Route::get ('/eventosPsicologia/calendar', 'ApiController@eventosPsicologia');

//api/eventosCiclos/calendar
Route::get ('/eventosCiclos/calendar', 'ApiController@eventosCiclos');

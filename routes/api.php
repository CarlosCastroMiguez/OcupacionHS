<?php

use Illuminate\Http\Request;

//api/eventos/calendar
Route::get ('/eventos/calendar', 'ApiController@eventos');

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




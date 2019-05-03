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


//api/eventos1/calendar
Route::get ('/eventos1/calendar', 'ApiController@eventos1');

//api/eventos2/calendar
Route::get ('/eventos2/calendar', 'ApiController@eventos2');





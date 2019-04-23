<?php

use Illuminate\Http\Request;

//api/eventos/calendar
Route::get ('/eventos/calendar', 'ApiController@eventos');

//api/resources/salas
Route::get ('/resources/salas', 'ApiController@salas');

//api/asignaturas/grados
Route::get ('/asignaturas/grados', 'ApiController@grados');



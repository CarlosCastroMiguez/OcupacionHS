<?php

use Illuminate\Http\Request;

//api/eventos/calendar
Route::get ('/eventos/calendar', 'Admin\AsignaturaController@eventos');

//api/resources/salas
Route::get ('/resources/salas', 'Admin\SalaController@salas');



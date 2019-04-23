<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Evento;
use App\Sala;
use App\Asignatura;

class ApiController extends Controller
{
    //api/eventos/calendar
    public function eventos(){
        
        $events = Evento::all("id", "nombre as title", "start_date as start", "end_date as end", "id_sala as resourceId")->toArray();
        //BB DD 2019-04-19 10:00:00.000000
        //2019-04-18 11:00:00
        return response()->json($events);
    }
    
    //api/resources/salas
    public function salas(){
        
        $salas = Sala::all("id", "tipo as title")->toArray();
        return response()->json($salas);
    }
    
    //api/asignaturas/grados
    public function grados(){
        
        //$grados = Asignatura::groupBy('grado')->get();
        //$grados = Asignatura::groupBy('grado')->select('grado', Asignatura::raw('count(*) as total'))->get();
        
        $grados = DB::table('tfg.asignaturas')
                 ->select('grado', DB::raw('count(*) as total'))
                 ->groupBy('grado')
                 ->get();
        
        return response()->json($grados);
    }
    
}

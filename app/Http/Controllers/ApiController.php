<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Evento;
use App\Sala;
use App\Asignatura;
use App\Simulador;

class ApiController extends Controller
{
    //api/eventosFisioterapia/calendar
    public function eventosFisioterapia(){
        
        $fisioterapia = DB::table('tfg.asignaturas')->select('id')->where('grado', "Fisioterapia")->get();
        $array =[];
        foreach($fisioterapia as $obj){
            $array[] = $obj->id;
        }
        
        $events = DB::table('tfg.eventos')
                    ->select('id', 'nombre as title', 'start_date as start', 'end_date as end', 'id_sala as resourceId', 'id_simulador')
                        ->whereIn('id_asignatura', $array)->get();
        
        return $events;
        
    }
    //api/eventosEnfermeria/calendar
    public function eventosEnfermeria(){
        
        $enfermeria = DB::table('tfg.asignaturas')->select('id')->where('grado', "Enfermeria")->get();
        $array =[];
        foreach($enfermeria as $obj){
            $array[] = $obj->id;
        }
        
        $events = DB::table('tfg.eventos')
                    ->select('id', 'nombre as title', 'start_date as start', 'end_date as end', 'id_sala as resourceId', 'id_simulador')
                        ->whereIn('id_asignatura', $array)->get();
        
        return $events;
        
    }
    //api/eventosFarmacia/calendar
    public function eventosFarmacia(){
        
        $farmacia = DB::table('tfg.asignaturas')->select('id')->where('grado', "Farmacia")->get();
        $array =[];
        foreach($farmacia as $obj){
            $array[] = $obj->id;
        }
        
        $events = DB::table('tfg.eventos')
                    ->select('id', 'nombre as title', 'start_date as start', 'end_date as end', 'id_sala as resourceId', 'id_simulador')
                        ->whereIn('id_asignatura', $array)->get();
        
        return $events;
        
    }
    //api/eventosMedicina/calendar
    public function eventosMedicina(){
        
        $medicina = DB::table('tfg.asignaturas')->select('id')->where('grado', "Medicina")->get();
        $array =[];
        foreach($medicina as $obj){
            $array[] = $obj->id;
        }
        
        $events = DB::table('tfg.eventos')
                    ->select('id', 'nombre as title', 'start_date as start', 'end_date as end', 'id_sala as resourceId', 'id_simulador')
                        ->whereIn('id_asignatura', $array)->get();
        
        return $events;
        
    }
    //api/eventosOdontologia/calendar
    public function eventosOdontologia(){
        
        $odontologia = DB::table('tfg.asignaturas')->select('id')->where('grado', "Odontologia")->get();
        $array =[];
        foreach($odontologia as $obj){
            $array[] = $obj->id;
        }
        
        $events = DB::table('tfg.eventos')
                    ->select('id', 'nombre as title', 'start_date as start', 'end_date as end', 'id_sala as resourceId', 'id_simulador')
                        ->whereIn('id_asignatura', $array)->get();
        
        return $events;
        
    }
    //api/eventosPsicologia/calendar
    public function eventosPsicologia(){
        
        $psicologia = DB::table('tfg.asignaturas')->select('id')->where('grado', "Psicologia")->get();
        $array =[];
        foreach($psicologia as $obj){
            $array[] = $obj->id;
        }
        
        $events = DB::table('tfg.eventos')
                    ->select('id', 'nombre as title', 'start_date as start', 'end_date as end', 'id_sala as resourceId', 'id_simulador')
                        ->whereIn('id_asignatura', $array)->get();
        
        return $events;
        
    }
    
    //api/eventosCiclos/calendar
    public function eventosCiclos(){
        
        $ciclos = DB::table('tfg.asignaturas')->select('id')->where('grado', "Ciclos Formativos")->get();
        $array =[];
        foreach($ciclos as $obj){
            $array[] = $obj->id;
        }
        
        $events = DB::table('tfg.eventos')
                    ->select('id', 'nombre as title', 'start_date as start', 'end_date as end', 'id_sala as resourceId', 'id_simulador')
                        ->whereIn('id_asignatura', $array)->get();
        
        return $events;
        
    }
    
    //api/eventosOtros/calendar
    public function eventosOtros(){
        
        $otros = DB::table('tfg.asignaturas')->select('id')->where('grado', "Otros")->get();
        $array =[];
        foreach($otros as $obj){
            $array[] = $obj->id;
        }
        
        $events = DB::table('tfg.eventos')
                    ->select('id', 'nombre as title', 'start_date as start', 'end_date as end', 'id_sala as resourceId', 'id_simulador')
                        ->whereIn('id_asignatura', $array)->get();
        
        return $events;
        
    }
    
    //api/simuladores
    public function simuladores(){
        
        $simuladores = Simulador::all('id', 'nombre')->toArray();
        return response()->json($simuladores);
    }

    //api/resources/salas
    public function salas(){
        
        $salas = Sala::all("id", "tipo as title")->toArray();
        return response()->json($salas);
    }
    
    //api/cursos/{grado_val}
    public function byCurso($grad){
        
        //Agrupame por curso y que pertenezcan al grado indicado(me quito las que se repiten pero tienen dist grupo)
        $cursos = DB::table('tfg.asignaturas')
                 ->select('curso', DB::raw('count(*) as total'))
                 ->groupBy('curso')->where('grado', $grad)->whereNull("deleted_at")
                 ->get();
        
        return $cursos;
    }
    
    //api/asignaturas/{grado_val}/{curso_val}
    public function byAsignatura($grad, $curs){
        
        //Agrupame por nombre de asignatura y que pertenezcan al grado indicado(me quito las que se repiten pero tienen dist grupo)
        $asignaturas = DB::table('tfg.asignaturas')
                 ->select('nombre', DB::raw('count(*) as total'))
                 ->groupBy('nombre')->where('grado', $grad)->where('curso', $curs)
                 ->get();
        
        return $asignaturas;
    }
    
    //api/grupos/{grado_val}/{curso_val}/{asignatura_val}
    public function byGrupo($grad, $curs, $asig){
        
        //Agrupame por nombre de asignatura y que pertenezcan al grado indicado(me quito las que se repiten pero tienen dist grupo)
        $grupos = DB::table('tfg.asignaturas')
                 ->select("grupo", DB::raw('count(*) as total'))
                 ->groupBy("grupo")->where('grado', $grad)->where('curso', $curs)->where('nombre', $asig)
                 ->get();
        
        return $grupos;
    }
    
    //Api para obtener todos los datos sobre la asignatura que desea implementar el usuario en crear evento.
    
    //api/id/{grado_val}/{curso_val}/{asignatura_val}/{grup_val}
    public function idAsignatura($grad,$curs, $asig, $grup){
        
        //Agrupame por nombre de asignatura y que pertenezcan al grado indicado(me quito las que se repiten pero tienen dist grupo)
        $id = Asignatura::where('grado', $grad)->where('curso', $curs)->where('nombre', $asig)->where('grupo', $grup)->get();
        
        return $id;
    }
    
    
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Evento;
use App\Sala;
use App\Asignatura;

class ApiController extends Controller
{
    //api/eventosFisioterapia/calendar
    public function eventosFisioterapia(){
        
        $enfermeria = DB::table('tfg.asignaturas')->select('id')->where('grado', "Fisioterapia")->get();
        $array =[];
        foreach($enfermeria as $obj){
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
        
        $enfermeria = DB::table('tfg.asignaturas')->select('id')->where('grado', "Farmacia")->get();
        $array =[];
        foreach($enfermeria as $obj){
            $array[] = $obj->id;
        }
        
        $events = DB::table('tfg.eventos')
                    ->select('id', 'nombre as title', 'start_date as start', 'end_date as end', 'id_sala as resourceId', 'id_simulador')
                        ->whereIn('id_asignatura', $array)->get();
        
        return $events;
        
    }
    //api/eventosMedicina/calendar
    public function eventosMedicina(){
        
        $enfermeria = DB::table('tfg.asignaturas')->select('id')->where('grado', "Medicina")->get();
        $array =[];
        foreach($enfermeria as $obj){
            $array[] = $obj->id;
        }
        
        $events = DB::table('tfg.eventos')
                    ->select('id', 'nombre as title', 'start_date as start', 'end_date as end', 'id_sala as resourceId', 'id_simulador')
                        ->whereIn('id_asignatura', $array)->get();
        
        return $events;
        
    }
    //api/eventosOdontologia/calendar
    public function eventosOdontologia(){
        
        $enfermeria = DB::table('tfg.asignaturas')->select('id')->where('grado', "Odontologia")->get();
        $array =[];
        foreach($enfermeria as $obj){
            $array[] = $obj->id;
        }
        
        $events = DB::table('tfg.eventos')
                    ->select('id', 'nombre as title', 'start_date as start', 'end_date as end', 'id_sala as resourceId', 'id_simulador')
                        ->whereIn('id_asignatura', $array)->get();
        
        return $events;
        
    }
    //api/eventosPsicologia/calendar
    public function eventosPsicologia(){
        
        $enfermeria = DB::table('tfg.asignaturas')->select('id')->where('grado', "Psicologia")->get();
        $array =[];
        foreach($enfermeria as $obj){
            $array[] = $obj->id;
        }
        
        $events = DB::table('tfg.eventos')
                    ->select('id', 'nombre as title', 'start_date as start', 'end_date as end', 'id_sala as resourceId', 'id_simulador')
                        ->whereIn('id_asignatura', $array)->get();
        
        return $events;
        
    }
    
    //api/eventosCiclos/calendar
    public function eventosCiclos(){
        
        $enfermeria = DB::table('tfg.asignaturas')->select('id')->where('grado', "Ciclos Formativos")->get();
        $array =[];
        foreach($enfermeria as $obj){
            $array[] = $obj->id;
        }
        
        $events = DB::table('tfg.eventos')
                    ->select('id', 'nombre as title', 'start_date as start', 'end_date as end', 'id_sala as resourceId', 'id_simulador')
                        ->whereIn('id_asignatura', $array)->get();
        
        return $events;
        
    }
    
    //api/resources/salas
    public function salas(){
        
        $salas = Sala::all("id", "tipo as title")->toArray();
        return response()->json($salas);
    }
    
    //api/asignaturas/{grado_val}
    public function byAsignatura($grad){
        
        //Agrupame por nombre de asignatura y que pertenezcan al grado indicado(me quito las que se repiten pero tienen dist grupo)
        $asignaturas = DB::table('tfg.asignaturas')
                 ->select('nombre', DB::raw('count(*) as total'))
                 ->groupBy('nombre')->where('grado', $grad)
                 ->get();
        
        return $asignaturas;
    }
    
    //api/grupos/{grado_val}/{asignatura_val}
    public function byGrupo($grad, $asig){
        
        //Agrupame por nombre de asignatura y que pertenezcan al grado indicado(me quito las que se repiten pero tienen dist grupo)
        $grupos = DB::table('tfg.asignaturas')
                 ->select("grupo", DB::raw('count(*) as total'))
                 ->groupBy("grupo")->where('grado', $grad)->where('nombre', $asig)
                 ->get();
        
        return $grupos;
    }
    
    //Api para obtener todos los datos sobre la asignatura que desea implementar el usuario en crear evento.
    
    //api/id/{grado_val}/{asignatura_val}/{grup_val}
    public function idAsignatura($grad, $asig, $grup){
        
        //Agrupame por nombre de asignatura y que pertenezcan al grado indicado(me quito las que se repiten pero tienen dist grupo)
        $id = Asignatura::where('grado', $grad)->where('nombre', $asig)->where('grupo', $grup)->get();
        
        return $id;
    }
    
    
    
}

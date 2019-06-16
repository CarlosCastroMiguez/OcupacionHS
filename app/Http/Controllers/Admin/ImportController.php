<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;

use App\Evento;
use App\Sala;
use App\Asignatura;
use App\Profesor;
use App\Simulador;


class ImportController extends Controller
{
    public function index() {
        
        return view('admin.eventos.importar');
    }
    
    public function import(Request $request){
        
        $path2 = $request->file('csv');

        $destinationPath = public_path('uploads');
        
        if (!$path2->move($destinationPath, $path2->getClientOriginalName())) {
            
            return back()->with('error', 'Error al mover el archivo');
        }    
        
        
        $path = public_path('uploads\\' . $path2->getClientOriginalName());
        
        
        $lines = file($path);
        $utf8_lines = array_map('utf8_encode', $lines);
        $array = array_map('str_getcsv', $utf8_lines);
        $size = sizeof($array);
        
        for ($i=1; $i<$size; ++$i){
            
            $evento = new Evento();
            
            $evento->nombre = $array[$i][0];
            $evento->numAlumnos = $array[$i][1];
            $evento->start_date = $array[$i][2];
            $evento->end_date = $array[$i][3];
            if($array[$i][8] == '')
                $evento->actor = null;
            else
                $evento->actor = $array[$i][8];
            
            
            $evento->id_asignatura = $this->getIdAsignatura($array[$i][4]);
            $evento->id_profesor = $this->getIdProfesor($array[$i][5]);
            $evento->id_sala = $this->getIdSala($array[$i][6]);
            $evento->id_simulador = $this->getIdSimulador($array[$i][7]);
            
            $evento->save();
            
        }
        
        return back()->with('notification', 'Archivo importado correctamente');
        
    }
    
    public function getIdAsignatura($nombreAsignatura){
        
        $asignatura = Asignatura::where('nombre', $nombreAsignatura)->first();
        
        if($asignatura){
            return $asignatura->id;
        }
        
        $asignatura = new Asignatura();
        $asignatura->nombre = $nombreAsignatura;
        
        $asignatura->save();
        
        return $asignatura->id;
    }
    
    public function getIdProfesor($nombreProfesor){
        
        $profesor = Profesor::where('nombre', $nombreProfesor)->first();
        
        if($profesor){
            return $profesor->id;
        }
        
        $profesor = new Asignatura();
        $profesor->nombre = $nombreProfesor;
        
        $profesor->save();
        
        return $profesor->id;
    }
    
    public function getIdSala($nombreSala){
        
        $sala = Sala::where('tipo', $nombreSala)->first();
        
        if($sala){
            return $sala->id;
        }
        
        $sala = new Asignatura();
        $sala->tipo = $nombreSala;
        
        $sala->save();
        
        return $sala->id;
    }
    
    public function getIdSimulador($nombreSimulador){
        
        $simulador = Simulador::where('nombre', $nombreSimulador)->first();
        
        if($simulador){
            return $simulador->id;
        }
        
        $simulador = new Asignatura();
        $simulador->nombre = $nombreSimulador;
        
        $simulador->save();
        
        return $simulador->id;
    }
}

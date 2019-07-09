<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\URL;
use App\Exports\EventosExport;
use Maatwebsite\Excel\Facades\Excel;

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
    
    public function export() 
    {
        return Excel::download(new EventosExport, 'EventosHS.xlsx');
        
    }
    
    public function import(Request $request){

            $rules = [
                'csv'  => 'required|mimes:csv,txt', 
            ];

            $messages = [

                'csv.required' => 'Es necesario seleccionar un archivo.', 
                'csv.mimes'    => 'La extensión del archivo ha de ser csv o txt.', 
            ];

            $this->validate($request, $rules, $messages);
            
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
        
            $errores = 0;
                
            for ($i=1; $i<$size; ++$i){

                try {

                    $evento = new Evento();

                    $capacidad = Sala::where('id', $this->getIdSala($array[$i][7]))->first()->capacidad;
                    
                    
                    if($array[$i][1]<= $capacidad){
                        
                        $evento->nombre = $array[$i][0];
                        $evento->numAlumnos = $array[$i][1];
                        
                        if(strtotime($array[$i][2]) < strtotime($array[$i][3])){
                            $evento->start_date = $array[$i][2];
                            $evento->end_date = $array[$i][3];
                        }
                        
                        if($array[$i][8] == '')
                            $evento->actor = null;
                        else
                            $evento->actor = $array[$i][8];


                        $evento->id_asignatura = $this->getIdAsignatura($array[$i][4]);
                        $evento->id_profesor = $this->getIdProfesor($array[$i][5], $array[$i][6]);
                        $evento->id_sala = $this->getIdSala($array[$i][7]);
                        $evento->id_simulador = $this->getIdSimulador($array[$i][8]);

                        $evento->save();
                    }else{
                        
                        $errores +=1;
                    }
                }catch (\Exception $ex) {
                    $errores += 1;

                }
            }
            
            if($errores > 0){
                return back()->withErrors($errores . ' registros contenían errores, el resto se han importado correctamente.');
            }
        
            return back()->with('notification', 'Archivo importado correctamente');
        
    }
    
    public function getIdAsignatura($nombreAsignatura){
        
        $asignatura = Asignatura::where('nombre', $nombreAsignatura)->first();
        
        if($asignatura){
            return $asignatura->id;
        }
        
    }
    
    public function getIdProfesor($nombreProfesor, $apellidoProfesor){
        
        $profesor = Profesor::where('nombre', $nombreProfesor)
                ->where('apellido', $apellidoProfesor)->first();
        
        if($profesor){
            return $profesor->id;
        }
        
    }
    
    public function getIdSala($nombreSala){
        
        $sala = Sala::where('tipo', $nombreSala)->first();
        
        if($sala){
            return $sala->id;
        }
        
    }
    
    public function getIdSimulador($nombreSimulador){
        
        $simulador = Simulador::where('nombre', $nombreSimulador)->first();
        
        if($simulador){
            return $simulador->id;
        }
        
    }
}

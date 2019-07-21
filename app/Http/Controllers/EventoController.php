<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use App\Asignatura;
use App\Profesor;
use App\Sala;
use App\Simulador;

class EventoController extends Controller
{   
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function calendar(){   
        
        return view ('calendar');
    }
    
    public function index(){  
        
        $salas = Sala::all();
        $eventos = new Evento;
        $consultas = [];
        
        $columns =[
            'id_sala', 'id_asignatura'
        ];
        
        foreach($columns as $column){
            if(request()->has($column)){
                $eventos = $eventos->where($column, request($column));
                $consultas[$column] = request($column);
            }
        }
        
        
        if(request()->has('sort')){
            $eventos = $eventos->orderBy('id', request('sort'));
            $consultas['sort'] = request('sort');
        }
        
        
        $eventos = $eventos->paginate(10)->appends($consultas);
        
        return view('eventos.index')->with(compact('eventos', 'salas'));
        
    }
    
    public function show($id){   
        $evento = Evento::find($id);
        return view ('eventos.show')->with(compact('evento'));
    }
    
    public function create(){ 
        
        $profesores = Profesor::all();
        $asignaturas = Asignatura::all();
        $simuladores = Simulador::all();
        $salas = Sala::all();
        
        return view('admin.eventos.create')->with(compact('profesores', 'salas', 'simuladores', 'asignaturas'));
    }

    public function store(Request $request) {
        
        $this->validate($request, Evento::$rules, Evento::$messages );
        
        $capacidad = Sala::where('id', $request->input('sala'))->first()->capacidad;
        
        if($capacidad < $request->input('numAlumnos')){
            return back()->withErrors('El numero de alumnos designado para el evento es mayor a la capacidad de la sala seleccionada.');
        }
        
        //obtengo la asignatura resultante para usar su id.
        //Gracias a esto evito hacerlo mediante js->ajax y aumento la seguridad de la web
        //para no exponer mi BBDD.
        $asig = Asignatura::where('grado', $request->input('grado'))
                                    ->where('nombre', $request->input('asignatura'))
                                        ->where('grupo', $request->input('grupo'))->first();
        
        
        $evento = new Evento();
        
        $evento->nombre = $request->input('nombre');
        $evento->numAlumnos = $request->input('numAlumnos');
        $evento->start_date = $request->input('start_date');
        $evento->end_date = $request->input('end_date');
        $evento->id_profesor = $request->input('profesor');
        $evento->id_asignatura = $asig->id;
        $evento->id_sala = $request->input('sala');
        $evento->id_simulador = $request->input('simulador');
        $evento->actor = $request->input('actor');
        
        
        $evento->save();
        
        return back()->with('notification', 'Evento añadido correctamente');
    }
    
    public function edit($id) {
        
        $evento = Evento::find($id);
        
        $profesores = Profesor::all();
        $asignaturas = Asignatura::all();
        $simuladores = Simulador::all();
        $salas = Sala::all();
        
        return view('admin.eventos.edit')->with(compact('evento', 'profesores', 'salas', 'simuladores', 'asignaturas'));
        
        
    }
    
    public function update($id, Request $request) {
        
        //obtengo la asignatura resultante para usar su id.
        //Gracias a esto evito hacerlo mediante js->ajax y aumento la seguridad de la web
        //para no exponer mi BBDD.
        $asig = Asignatura::withTrashed()->where('grado', $request->input('grado'))
                                            ->where('nombre', $request->input('asignatura'))
                                                ->where('grupo', $request->input('grupo'))->first();
        
        $capacidad = Sala::withTrashed()->where('id', $request->input('sala'))->first()->capacidad;
        

        if($capacidad < $request->input('numAlumnos')){
            return back()->withErrors('El numero de alumnos designado para el evento es mayor a la capacidad de la sala seleccionada.');
        }
        
        $evento = Evento::find($id);
        
        $this->validate($request, Evento::$rules, Evento::$messages );
        
        $evento->nombre = $request->input('nombre');
        $evento->numAlumnos = $request->input('numAlumnos');
        $evento->start_date = $request->input('start_date');
        $evento->end_date = $request->input('end_date');
        $evento->id_asignatura = $asig->id;
        $evento->id_profesor = $request->input('profesor');
        $evento->id_sala = $request->input('sala');
        $evento->id_simulador = $request->input('simulador');
        $evento->actor = $request->input('actor');
        
        $evento->save();
        
        return redirect('eventos')->with('notification', 'Evento actualizado correctamente');
    }
    
    public function delete($id) {
        
        Evento::findOrFail($id)->delete();
        $eventos = Evento::all();
        
        return redirect('/eventos')->with('notification', 'Evento eliminado correctamente')->with(compact('eventos'));
        
    }
    
    public function update2 (Request $request) {
        
        $rules = [
            
            'id_sala' => 'nullable',
            
        ];
        
        $this->validate($request, $rules);  
        
        $evento_id = $request->input('evento_id');    
        $evento = Evento::find($evento_id);
        
        $evento->start_date = $request->input('start_date');
        $evento->end_date = $request->input('end_date'); 
        
        $id_sala = $request->input('id_sala');
        if($id_sala)
            $evento->id_sala = $id_sala;
            
        $evento->save();
        
        return back()->with('notification', 'Evento actualizado correctamente');
        
    }
    
    
    
    
}

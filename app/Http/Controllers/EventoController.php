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
        $eventos = Evento::all();
        return view('eventos.index')->with(compact('eventos'));
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
        
        //$this->validate($request, Evento::$rules, Evento::$messages );
        
        $evento = new Evento();
        
        $evento->nombre = $request->input('nombre');
        $evento->numAlumnos = $request->input('numAlumnos');
        $evento->start_date = $request->input('start_date');
        $evento->end_date = $request->input('end_date');
        $evento->id_asignatura = $request->input('asignatura');
        $evento->id_profesor = $request->input('profesor');
        $evento->id_sala = $request->input('sala');
        $evento->id_simulador = $request->input('simulador');
            
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
        
        $evento = Evento::find($id);
        
        //$this->validate($request, Evento::$rules, Evento::$messages );
        
        $evento->nombre = $request->input('nombre');
        $evento->numAlumnos = $request->input('numAlumnos');
        $evento->start_date = $request->input('start_date');
        $evento->end_date = $request->input('end_date');
        $evento->id_asignatura = $request->input('asignatura');
        $evento->id_profesor = $request->input('profesor');
        $evento->id_sala = $request->input('sala');
        $evento->id_simulador = $request->input('simulador');
        
        $evento->save();
        
        return redirect('eventos')->with('notification', 'Evento actualizado correctamente');
    }
    
    public function delete($id) {
        
        Evento::findOrFail($id)->delete();
        $eventos = Evento::all();
        
        return redirect('/eventos')->with('notification', 'Evento eliminado correctamente')->with(compact('eventos'));
        
    }
    
    
    
    
}

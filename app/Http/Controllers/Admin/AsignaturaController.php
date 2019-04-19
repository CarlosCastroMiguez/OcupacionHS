<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Asignatura; 
use App\Evento; 

class AsignaturaController extends Controller
{   
        
    //He de definir esta funcion para la api ya que en el controlador de eventos requiere autenticacion y no recibo la respuesta.  
    public function eventos(){
        
        $events = Evento::all("id", "nombre as title", "start_date as start", "end_date as end", "id_sala as resourceId")->toArray();
        //BB DD 2019-04-19 10:00:00.000000
        //2019-04-18 11:00:00
        return response()->json($events);
    }
    
    public function index() {
        
        $asignaturas = Asignatura::all();
        return view('admin.asignaturas.index')->with(compact('asignaturas'));
    }
    public function store(Request $request) {
                
        //si la validacion no se cumple no se avanza
        $this->validate($request, Asignatura::$rules, Asignatura::$messages );
        
        //Forma 2 de crear incident:
        $asignatura = new Asignatura();
        
        $asignatura->nombre = $request->input('nombre');
        $asignatura->codigo = $request->input('codigo');
        $asignatura->grado = $request->input('grado');
        $asignatura->curso = $request->input('curso');
        $asignatura->grupo = $request->input('grupo');
            
        $asignatura->save();
        
        return back()->with('notification', 'Asignatura añadida');
        
    }
    
    public function edit($id){
        
        $asignatura = Asignatura::find($id);
        return view('admin.asignaturas.edit')->with(compact('asignatura'));
        
    }
    public function update($id, Request $request) {
        
        $asignatura = Asignatura::find($id);
        
        
        $this->validate($request, Asignatura::$rules, Asignatura::$messages );
        
        $asignatura->nombre = $request->input('nombre');
        $asignatura->codigo = $request->input('codigo');
        $asignatura->grado = $request->input('grado');
        $asignatura->curso = $request->input('curso');
        $asignatura->grupo = $request->input('grupo');
            
        $asignatura->save();
        
        return redirect('asignaturas')->with('notification', 'Asignatura actualizada correctamente');
        
    }
    public function delete($id) {
        
        $asignaturas = Asignatura::find($id)->delete();
                
        return back()->with('notification', 'Asignatura eliminada correctamente'); 
        
    }
}

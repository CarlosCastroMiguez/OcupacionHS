<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Asignatura; 

class AsignaturaController extends Controller
{   
        
    
    public function index() {
        
        $asignaturas = Asignatura::withTrashed()->paginate(5);
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
        
        Asignatura::find($id)->delete();
                
        return back()->with('notification', 'Asignatura deshabilitada correctamente'); 
        
    }
    
    public function restore($id)
    {   
        Asignatura::withTrashed()->find($id)->restore();
        return back()->with('notification', 'Asignatura habilitada correctamente');
    }
}

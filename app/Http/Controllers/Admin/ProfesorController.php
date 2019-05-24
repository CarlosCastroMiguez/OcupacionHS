<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profesor; 

class ProfesorController extends Controller
{
    public function index() {
        
        $profesores = Profesor::withTrashed()->paginate(5);
        return view('admin.profesores.index')->with(compact('profesores'));
    }
    public function store(Request $request) {
                
        //si la validacion no se cumple no se avanza
        $this->validate($request, Profesor::$rules, Profesor::$messages );
        
        //Forma 2 de crear incident:
        $profesor = new Profesor();
        
        $profesor->nombre = $request->input('nombre');
        $profesor->apellido = $request->input('apellido');
        $profesor->departamento = $request->input('departamento');
            
        $profesor->save();
        
        return back()->with('notification', 'Profesor añadido correctamente');
        
    }
    
    public function edit($id){
        
        $profesor = Profesor::find($id);
        return view('admin.profesores.edit')->with(compact('profesor'));
        
    }
    public function update($id, Request $request) {
        
        $profesor = Profesor::find($id);
        
        
        $this->validate($request, Profesor::$rules, Profesor::$messages );
        
        $profesor->nombre = $request->input('nombre');
        $profesor->apellido = $request->input('apellido');
        $profesor->departamento = $request->input('departamento');
            
        $profesor->save();
        
        return redirect('profesores')->with('notification', 'Profesor actualizado correctamente');
        
    }
    public function delete($id) {
        
        Profesor::find($id)->delete();
                
        return back()->with('notification', 'Profesor deshabilitado correctamente'); 
        
    }
    
    public function restore($id)
    {   
        Profesor::withTrashed()->find($id)->restore();        
        return back()->with('notification', 'Profesor habilitado correctamente');
    }
}

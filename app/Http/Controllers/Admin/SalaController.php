<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Sala;

class SalaController extends Controller
{   
    
    public function index() {
        
        $salas = Sala::withTrashed()->paginate(5);
        return view('admin.salas.index')->with(compact('salas'));
    }
    public function store(Request $request) {
                
        //si la validacion no se cumple no se avanza
        $this->validate($request, Sala::$rules, Sala::$messages );
        
        //Forma 2 de crear incident:
        $sala = new Sala();
        
        $sala->tipo = $request->input('tipo');
        $sala->capacidad = $request->input('capacidad');
            
        $sala->save();
        
        return back()->with('notification', 'Sala añadida');
        
    }
    
    public function edit($id){
        
        $sala = Sala::find($id);
        return view('admin.salas.edit')->with(compact('sala'));
        
    }
    public function update($id, Request $request) {
        
        $sala = Sala::find($id);
        
        
        $this->validate($request, Sala::$rules, Sala::$messages );
        
        $sala->tipo = $request->input('tipo');
        $sala->capacidad = $request->input('capacidad');
            
        $sala->save();
        
        return redirect('salas')->with('notification', 'Sala actualizada correctamente');
        
    }
    public function delete($id) {
        
        Sala::find($id)->delete();
                
        return back()->with('notification', 'Sala deshabilitada correctamente'); 
        
    }
    
    public function restore($id)
    {   
        Sala::withTrashed()->find($id)->restore();

        return back()->with('notification', 'Sala habilitada correctamente');
    }
}

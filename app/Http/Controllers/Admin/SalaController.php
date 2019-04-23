<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Sala;
use App\TipoSala;

class SalaController extends Controller
{   
    
    public function index() {
        
        $salas = Sala::all();
        $tipos_sala = TipoSala::all();
        return view('admin.salas.index')->with(compact('salas', 'tipos_sala'));
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
        $tipos_sala = TipoSala::all();
        return view('admin.salas.edit')->with(compact('sala',  'tipos_sala'));
        
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
        
        $salas = Sala::find($id)->delete();
                
        return back()->with('notification', 'Sala eliminada correctamente'); 
        
    }
}

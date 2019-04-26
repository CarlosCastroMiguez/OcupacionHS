<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Simulador;
use App\TipoSala;

class SimuladorController extends Controller
{
    public function index() {
        
        $simuladores = Simulador::all();
        $tipos_sala = TipoSala::all();
        return view('admin.otros.index')->with(compact('simuladores','tipos_sala'));
    }
    public function store(Request $request) {
                
        //si la validacion no se cumple no se avanza
        $this->validate($request, Simulador::$rules, Simulador::$messages );
        
        //Forma 2 de crear incident:
        $simulador = new Simulador();
        
        $simulador->nombre = $request->input('nombre');
            
        $simulador->save();
        
        return back()->with('notification1', 'Simulador añadido correctamente');
        
    }
    public function update(Request $request) {
        
        $this->validate($request, Simulador::$rules, Simulador::$messages );  
        
        $simulador_id = $request->input('simulador_id');    
        $simulador = Simulador::find($simulador_id);
        
        $simulador->nombre = $request->input('nombre'); 
        
        $simulador->save();
        
        return back();
        
    }
    public function delete($id) {
        
        Simulador::find($id)->delete();
                
        return back()->with('notification1', 'Simulador eliminado correctamente'); 
        
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\TipoSala;

class TipoSalaController extends Controller
{
    public function store(Request $request) {
                
        //si la validacion no se cumple no se avanza
        //$this->validate($request, TipoSala::$rules, TipoSala::$messages );
        
        //Forma 2 de crear incident:
        $tipo_sala = new TipoSala();
        
        $tipo_sala->nombre = $request->input('nombre');
            
        $tipo_sala->save();
        
        return back()->with('notification', 'Tipo de Sala añadido correctamente');
        
    }
    public function update(Request $request) {
        
        $this->validate($request, ['nombre' => 'required'], ['nombre.required' => 'El nombre es requerido'] );  
        
        $tiposala_id = $request->input('tiposala_id');    
        $tiposala = TipoSala::find($tiposala_id);
        
        $tiposala->nombre = $request->input('nombre'); 
        
        $tiposala->save();
        
        return back();
        
    }
    public function delete($id) {
        
        TipoSala::find($id)->delete();
                
        return back()->with('notification', 'Tipo de Sala eliminada correctamente'); 
        
    }
}

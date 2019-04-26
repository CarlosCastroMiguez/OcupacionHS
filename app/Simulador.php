<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Simulador extends Model
{
        public static $rules = [
            
            'nombre' => 'required|min:5|max:20',
        ];
    
        public static $messages = [
            
            'nombre.required' => 'Es necesario ingresar un nombre de simulador',
                    
            'nombre.min' => 'El nombre debe presentar al menos 5 caracteres', 
            'nombre.max' => 'El nombre debe presentar como máximo 20 caracteres',
            
        ];
}

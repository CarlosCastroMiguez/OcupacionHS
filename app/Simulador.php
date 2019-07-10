<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Simulador extends Model
{
        use SoftDeletes;
        public static $rules = [
            
            'nombre' => 'required|min:3|max:20',
        ];
    
        public static $messages = [
            
            'nombre.required' => 'Es necesario ingresar un nombre de simulador',
                    
            'nombre.min' => 'El nombre debe presentar al menos 3 caracteres', 
            'nombre.max' => 'El nombre debe presentar como máximo 20 caracteres',
            
        ];
}

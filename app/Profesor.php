<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
        public static $rules = [
            
            'nombre' => 'required|string|min:2|max:15',
            'apellido' => 'required|min:2|max:20',
            'departamento' => 'required|min:5|max:30',
        ];
        
        public static $messages = [
            
            'nombre.required' => 'Es necesario ingresar un nombre de profesor',
            'nombre.string' => 'El nombre debe tener un formato adecuado',
            'nombre.min' => 'El nombre debe presentar al menos 2 caracteres', 
            'nombre.max' => 'El nombre debe presentar como máximo 15 caracteres',
            'apellido.required' => 'Es necesario introducir el apellido del profesor',
            'apellido.min' => 'El apellido debe presentar al menos 2 caracteres', 
            'apellido.max' => 'El apellido debe presentar como máximo 20 caracteres',
            'departamento.required' => 'Es necesario ingresar un departamento',
            'departamento.min' => 'El departamento debe presentar al menos 5 caracteres', 
            'departamento.max' => 'El departamento debe presentar como máximo 30 caracteres',
        ];
}

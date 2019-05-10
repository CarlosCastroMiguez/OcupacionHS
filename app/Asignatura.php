<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
        public static $rules = [
            
            'nombre' => 'required|min:5|max:150',
            'codigo' => 'required|integer|digits:10',
            'grado' => 'required|min:5|max:150',
            'curso' => 'required|integer|between:0,6',
            'grupo' => 'required|min:3|max:3',
            
        ];
        
        public static $messages = [
            
            'nombre.required' => 'Es necesario ingresar un nombre de asignatura',
            'codigo.required' => 'Es necesario ingresar un codigo de asignatura',
            'grado.required' => 'Es necesario ingresar un grado para la asignatura',
            'curso.required' => 'Es necesario ingresar un curso para la asignatura',
            'grupo.required' => 'Es necesario ingresar un grupo para la asignatura',
            
            'nombre.min' => 'El nombre debe presentar al menos 5 caracteres', 
            'nombre.max' => 'El nombre debe presentar como máximo 150 caracteres',
            
            'codigo.integer' => 'El codigo debe ser un numero entero', 
            'codigo.digits' => 'El codigo debe tener una longitud de 10 números.',
            
            'grado.min' => 'El grado debe presentar al menos 5 caracteres', 
            'grado.max' => 'El grado debe presentar como máximo 150 caracteres',
            
            'curso.integer' => 'El curso debe ser un numero entero', 
            'curso.between' => 'El curso debe estar entre 1 y 6',
            
            'grupo.min' => 'El grupo debe estar compuesto por 3 caracteres', 
            'grupo.max' => 'El grupo debe estar compuesto por 3 caracteres',
            
        ];
    
    public function eventos(){
        
        return $this->hasMany('App\Evento');
    }
}

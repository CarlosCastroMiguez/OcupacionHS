<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Sala extends Model
{
        use SoftDeletes;
        public static $rules = [
            
                'tipo' => 'required|min:2',
                'capacidad' => 'required|integer|between:2,75',
        ];
        
        public static $messages = [
            
            'tipo.required' => 'Es seleccionar un tipo de sala',
            'tipo.min' => 'El nombre de la sala debe contener como mínimo 2 caracteres.',
            
            
            'capacidad.between' => 'La capacidad introducida debe ser mayor que 1 y menor que 76.',
            'capacidad.required' => 'Es necesario ingresar un valor para la capacidad de la sala.',
            'capacidad.integer' => 'El valor introducido en la capacidad debe de ser un número',
            
        ];
}

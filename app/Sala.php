<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
        public static $rules = [
                'tipo' => 'required|in:Consulta,Simulación Compleja,Task Training,Hospitalización,Farmacia,Quirófano,Farmacia Comunitaria,Ambulancia',
                'capacidad' => 'required|integer|between:2,75',
        ];
        
        public static $messages = [
            'capacidad.between' => 'La capacidad introducida debe ser mayor que 1 y menor que 76.',
            'capacidad.required' => 'Es necesario ingresar un valor para la capacidad de la sala.',
            'capacidad.integer' => 'El valor introducido en la capacidad debe de ser un número',
            'tipo.in' => 'El tipo introducido ha de ser uno de los de la lista',
        ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    public function asignatura(){
        
        return $this->belongsTo('App\Asignatura', 'id_asignatura');
    }
    public function profesor(){
        return $this->belongsTo('App\Profesor', 'id_profesor');
    }
    
    public function sala(){
        return $this->belongsTo('App\Sala', 'id_sala');
    }
    
    public function simulador(){
        return $this->belongsTo('App\Simulador', 'id_simulador');
    }
    
    public function getNombreSimuladorAttribute(){
        if($this->simulador){
            return $this->simulador->nombre;
        }
        else
            return 'Sin simulador';
    }
    
    public function getTipoSalaAttribute(){
        if($this->sala){
            return $this->sala->tipo;
        }
        else
            return 'Sin sala';
    }
    
    public function getInfoAcademicaAttribute(){
        if($this->asignatura){
            $asig = $this->asignatura->nombre;
            $grad = $this->asignatura->grado;
            $curs = $this->asignatura->curso;
            $grup = $this->asignatura->grupo;
            
            $info = $grad  . ' - ' . $curs . 'º - ' . $asig . ' - ' . $grup;
        
            return $info;
            
        }
        
    }
    
    public function getNombreShortAttribute(){
         
        return mb_strimwidth($this->nombre,0,10,'...');        
        
    }
    
        public static $rules = [
            
            'nombre' => 'required|min:5|max:150',
            'numAlumnos' => 'required|between:2,75|integer',
            'start_date' => 'required',
            'end_date' => 'required|after:start_date',
            'sala' => 'required',
            'grado' => 'required',
            'asignatura' => 'required',
            'grupo' => 'required',
            'profesor' => 'required',
            
        ];
        
        public static $messages = [
            
            'nombre.required' => 'Es necesario ingresar un nombre de evento',
            'nombre.min' => 'El nombre ha de tener una longitud mínima de 5 caracteres',
            'nombre.max' => 'El nombre ha de tener una longitud mínima de 150 caracteres',
            
            'numAlumnos.between' => 'El numero de alumnos introducido debe ser mayor que 1 y menor que 76.',
            'numAlumnos.required' => 'Es necesario ingresar un valor para el número de alumnos.',
            'numAlumnos.integer' => 'El numero de alumnos debe de ser un número',
            
            'start_date.required' => 'Es necesario introducir una fecha de inicio',
            
            'end_date.required' => 'Es necesario introducir una fecha de fin',
            'end_date.after' => 'La fecha final ha de ser posterior a la fecha de inicio',
            
            'sala.required' => 'Es necesario seleccionar una sala',
            'grado.required' => 'Es necesario seleccionar un grado',
            'asignatura.required' => 'Es necesario seleccionar una asignatura',
            'grupo.required' => 'Es necesario seleccionar un grupo',
            'profesor.required' => 'Es necesario seleccionar un profesor',
            
        ];
    
}

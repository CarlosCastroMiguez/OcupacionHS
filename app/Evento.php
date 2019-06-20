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
    //Si tiene asignado un simulador devuelve el nombre, sino "Sin Simulador"
    public function getNombreSimuladorAttribute(){
        if($this->simulador){
            return $this->simulador->nombre;
        }
        else
            return 'Sin simulador';
    }
    //Si tiene actor devuelve la descripcion, sino "No hay actores asignados a este evento."
    public function getDescripcionActorAttribute(){
        if($this->actor){
            return $this->actor;
        }
        else
            return 'No hay actores asignados a este evento.';
    }
    //Si tiene sala devuelve su tipo(nombre) sino "Sin sala"
    public function getTipoSalaAttribute(){
        if($this->sala){
            return $this->sala->tipo;
        }
        else
            return 'Sin sala';
    }
    //Agrupa la informacion academica en un string.
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
    //Si el nombre es mas largo de 10 caracteres
    public function getNombreShortAttribute(){
    
        return mb_strimwidth($this->nombre,0,11,'...');        
        
    }
    
    public function getSalaShortAttribute(){
    
        return mb_strimwidth($this->sala->tipo,0,11,'...');        
        
    }
    //devuelve la fecha final del evento
    public function getFechaFinalAttribute(){
        
        $e_date = strftime('%Y-%m-%dT%H:%M:%S', strtotime($this->end_date));
        return $e_date;
        
    }
    //devuelve la fecha de inicio del evento
    public function getFechaInicioAttribute(){
        
        $s_date = strftime('%Y-%m-%dT%H:%M:%S', strtotime($this->start_date));
        return $s_date;
        
    }
    
    
    
    public static $rules = [

        'nombre' => 'required|min:5|max:44',
        'numAlumnos' => 'required|between:2,75|integer',
        'start_date' => 'required',
        'end_date' => 'required|after:start_date',
        'sala' => 'required',
        'grado' => 'required',
        'curso' => 'required',
        'asignatura' => 'required',
        'grupo' => 'required',
        'profesor' => 'required',
        'actor' => 'nullable|min:10',

    ];

    public static $messages = [

        'nombre.required' => 'Es necesario ingresar un nombre de evento',
        'nombre.min' => 'El nombre ha de tener una longitud mínima de 5 caracteres',
        'nombre.max' => 'El nombre ha de tener una longitud máxima de 44 caracteres',

        'numAlumnos.between' => 'El numero de alumnos introducido debe ser mayor que 1 y menor que 76.',
        'numAlumnos.required' => 'Es necesario ingresar un valor para el número de alumnos.',
        'numAlumnos.integer' => 'El numero de alumnos debe de ser un número',

        'start_date.required' => 'Es necesario introducir una fecha de inicio',

        'end_date.required' => 'Es necesario introducir una fecha de fin',
        'end_date.after' => 'La fecha final ha de ser posterior a la fecha de inicio',

        'sala.required' => 'Es necesario seleccionar una sala',
        'grado.required' => 'Es necesario seleccionar un grado',
        'curso.required' => 'Es necesario seleccionar un curso',
        'asignatura.required' => 'Es necesario seleccionar una asignatura',
        'grupo.required' => 'Es necesario seleccionar un grupo',
        'profesor.required' => 'Es necesario seleccionar un profesor',

        'actor.min' => 'La descripcion del actor debe tener una longitud mínima de 10 caracteres.',

    ];
    
}

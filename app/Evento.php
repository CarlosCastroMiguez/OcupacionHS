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
    
}

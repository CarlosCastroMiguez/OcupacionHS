<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    public function asignatura(){
        
        return $this->belongsTo('App\Asignatura');
    }
    public function profesor(){
        return $this->belongsTo('App\Profesor');
    }
    
    public function sala(){
        return $this->belongsTo('App\Sala');
    }
    
    public function simulador(){
        return $this->belongsTo('App\Simulador');
    }
    
}

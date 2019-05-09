<?php

use Illuminate\Database\Seeder;
use App\Evento;

    
class EventosTableSeeder extends Seeder
{
    
    public function run()
    {
        date_default_timezone_set("Europe/Madrid");
        $date = date("Y-m-d H:i:s");
        $s_date = strftime('%Y-%m-%dT%H:%M:%S', strtotime($date));
        $e_date = strftime('%Y-%m-%dT%H:%M:%S', strtotime('+2 hours'));
    
         Evento::create([
            'nombre' => 'Clase Fisioterapia',
            'numAlumnos' => '10',
            'start_date' => $s_date,
            'end_date' => $e_date,
            'id_asignatura' => 1,
            'id_profesor' => 1,
            'id_sala' => 1,
            'id_simulador' => 1
        ]);
        Evento::create([
            'nombre' => 'Clase  Enfermeria',
            'numAlumnos' => '10',
            'start_date' => $s_date,
            'end_date' => $e_date,
            'id_asignatura' => 3,
            'id_profesor' => 1,
            'id_sala' => 2,
            'id_simulador' => 1
        ]);
        Evento::create([
            'nombre' => 'Clase Farmacia',
            'numAlumnos' => '10',
            'start_date' => $s_date,
            'end_date' => $e_date,
            'id_asignatura' => 5,
            'id_profesor' => 1,
            'id_sala' => 3,
            'id_simulador' => 1
        ]);
        Evento::create([
            'nombre' => 'Clase Medicina',
            'numAlumnos' => '10',
            'start_date' => $s_date,
            'end_date' => $e_date,
            'id_asignatura' => 7,
            'id_profesor' => 1,
            'id_sala' => 4,
            'id_simulador' => 1
        ]);
        Evento::create([
            'nombre' => 'Clase Odontologia',
            'numAlumnos' => '10',
            'start_date' => $s_date,
            'end_date' => $e_date,
            'id_asignatura' => 9,
            'id_profesor' => 1,
            'id_sala' => 5,
            'id_simulador' => 1
        ]);
        Evento::create([
            'nombre' => 'Clase Psicología',
            'numAlumnos' => '10',
            'start_date' => $s_date,
            'end_date' => $e_date,
            'id_asignatura' => 11,
            'id_profesor' => 1,
            'id_sala' => 6,
            'id_simulador' => 1
        ]);
        Evento::create([
            'nombre' => 'Clase Ciclos',
            'numAlumnos' => '10',
            'start_date' => $s_date,
            'end_date' => $e_date,
            'id_asignatura' => 13,
            'id_profesor' => 1,
            'id_sala' => 6,
            'id_simulador' => 1
        ]);
        Evento::create([
            'nombre' => 'Clase Ciclos2',
            'numAlumnos' => '10',
            'start_date' => $s_date,
            'end_date' => $e_date,
            'id_asignatura' => 14,
            'id_profesor' => 1,
            'id_sala' => 1,
            'id_simulador' => 1
        ]);
    
    }
}

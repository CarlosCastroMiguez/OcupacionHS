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
            'nombre' => 'Fisioterapia',
            'numAlumnos' => '10',
            'start_date' => $s_date,
            'end_date' => $e_date,
            'id_asignatura' => 2,
            'id_profesor' => 1,
            'id_sala' => 1,
            'id_simulador' => 1
        ]);
        Evento::create([
            'nombre' => 'Enfermeria',
            'numAlumnos' => '10',
            'start_date' => $s_date,
            'end_date' => $e_date,
            'id_asignatura' => 4,
            'id_profesor' => 1,
            'id_sala' => 2,
            'id_simulador' => 2
        ]);
        Evento::create([
            'nombre' => 'Farmacia',
            'numAlumnos' => '10',
            'start_date' => $s_date,
            'end_date' => $e_date,
            'id_asignatura' => 6,
            'id_profesor' => 1,
            'id_sala' => 3,
            'id_simulador' => 3
        ]);
        Evento::create([
            'nombre' => 'Medicina',
            'numAlumnos' => '10',
            'start_date' => $s_date,
            'end_date' => $e_date,
            'id_asignatura' => 8,
            'id_profesor' => 1,
            'id_sala' => 4,
            'id_simulador' => 2
        ]);
        Evento::create([
            'nombre' => 'Odontologia',
            'numAlumnos' => '10',
            'start_date' => $s_date,
            'end_date' => $e_date,
            'id_asignatura' => 10,
            'id_profesor' => 1,
            'id_sala' => 5,
            'id_simulador' => 4
        ]);
        Evento::create([
            'nombre' => 'Psicología',
            'numAlumnos' => '10',
            'start_date' => $s_date,
            'end_date' => $e_date,
            'id_asignatura' => 12,
            'id_profesor' => 1,
            'id_sala' => 6,
            'id_simulador' => 5
        ]);
        Evento::create([
            'nombre' => 'Ciclos',
            'numAlumnos' => '10',
            'start_date' => $s_date,
            'end_date' => $e_date,
            'id_asignatura' => 14,
            'id_profesor' => 1,
            'id_sala' => 6,
            'id_simulador' => 2
        ]);
        Evento::create([
            'nombre' => 'Ciclos2',
            'numAlumnos' => '10',
            'start_date' => $s_date,
            'end_date' => $e_date,
            'id_asignatura' => 15,
            'id_profesor' => 1,
            'id_sala' => 1,
            'id_simulador' => 4
        ]);
        Evento::create([
            'nombre' => 'VISITA',
            'numAlumnos' => '10',
            'start_date' => $s_date,
            'end_date' => $e_date,
            'id_asignatura' => 1,
            'id_profesor' => 1,
            'id_sala' => 1,
            'id_simulador' => 1
        ]);
    
    }
}

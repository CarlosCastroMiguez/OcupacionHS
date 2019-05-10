<?php

use Illuminate\Database\Seeder;
use App\Asignatura;

class AsignaturasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        //Otros
        Asignatura::create([
            'nombre' => 'Otros',
            'codigo' => '0000000000',
            'grado' => 'Otros',
            'curso' => 2,
            'grupo' => '---'
        ]);
        //Fisioterapia
        Asignatura::create([
            'nombre' => 'Asignatura Fisioterapia1',
            'codigo' => '1111111111',
            'grado' => 'Fisioterapia',
            'curso' => 2,
            'grupo' => 'T11'
        ]);
        Asignatura::create([
            'nombre' => 'Asignatura Fisioterapia2',
            'codigo' => '1111111111',
            'grado' => 'Fisioterapia',
            'curso' => 2,
            'grupo' => 'T21'
        ]);
        //Enfermeria
        Asignatura::create([
            'nombre' => 'Asignatura Enfermeria1',
            'codigo' => '2222222222',
            'grado' => 'Enfermeria',
            'curso' => 3,
            'grupo' => 'T31'
        ]);
        Asignatura::create([
            'nombre' => 'Asignatura Enfermeria2',
            'codigo' => '2222222222',
            'grado' => 'Enfermeria',
            'curso' => 3,
            'grupo' => 'T41'
        ]);
        //Farmacia
        Asignatura::create([
            'nombre' => 'Asignatura Farmacia1',
            'codigo' => '3333333333',
            'grado' => 'Farmacia',
            'curso' => 2,
            'grupo' => 'M11'
        ]);
        Asignatura::create([
            'nombre' => 'Asignatura Farmacia2',
            'codigo' => '3333333333',
            'grado' => 'Farmacia',
            'curso' => 2,
            'grupo' => 'M21'
        ]);
        //Medicina
        Asignatura::create([
            'nombre' => 'Asignatura Medicina1',
            'codigo' => '4444444444',
            'grado' => 'Medicina',
            'curso' => 2,
            'grupo' => 'M31'
        ]);
        Asignatura::create([
            'nombre' => 'Asignatura Medicina2',
            'codigo' => '4444444444',
            'grado' => 'Medicina',
            'curso' => 2,
            'grupo' => 'M41'
        ]);
        //Odontologia
        Asignatura::create([
            'nombre' => 'Asignatura Odontologia1',
            'codigo' => '5555555555',
            'grado' => 'Odontologia',
            'curso' => 2,
            'grupo' => 'M12'
        ]);
        Asignatura::create([
            'nombre' => 'Asignatura Odontologia2',
            'codigo' => '5555555555',
            'grado' => 'Odontologia',
            'curso' => 2,
            'grupo' => 'M22'
        ]);
        //Psicologia
        Asignatura::create([
            'nombre' => 'Asignatura Psicologia1',
            'codigo' => '6666666666',
            'grado' => 'Psicologia',
            'curso' => 1,
            'grupo' => 'T12'
        ]);
        Asignatura::create([
            'nombre' => 'Asignatura Psicologia2',
            'codigo' => '6666666666',
            'grado' => 'Psicologia',
            'curso' => 1,
            'grupo' => 'T22'
        ]);
        //Ciclos Formativos
        Asignatura::create([
            'nombre' => 'Asignatura ciclos1',
            'codigo' => '7777777777',
            'grado' => 'Ciclos Formativos',
            'curso' => 4,
            'grupo' => 'T12'
        ]);
        Asignatura::create([
            'nombre' => 'Asignatura ciclos2',
            'codigo' => '7777777777',
            'grado' => 'Ciclos Formativos',
            'curso' => 4,
            'grupo' => 'T22'
        ]);
    }
}

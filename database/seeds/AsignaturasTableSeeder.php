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
        //Fisioterapia
        Asignatura::create([
            'nombre' => 'Física',
            'codigo' => '1111111111',
            'grado' => 'Fisioterapia',
            'curso' => 2,
            'grupo' => 'T11'
        ]);
        Asignatura::create([
            'nombre' => 'Física',
            'codigo' => '1111111111',
            'grado' => 'Fisioterapia',
            'curso' => 2,
            'grupo' => 'T21'
        ]);
        //Enfermeria
        Asignatura::create([
            'nombre' => 'Química',
            'codigo' => '2222222222',
            'grado' => 'Enfermeria',
            'curso' => 3,
            'grupo' => 'T31'
        ]);
        Asignatura::create([
            'nombre' => 'Química',
            'codigo' => '2222222222',
            'grado' => 'Enfermeria',
            'curso' => 3,
            'grupo' => 'T41'
        ]);
        //Farmacia
        Asignatura::create([
            'nombre' => 'Física',
            'codigo' => '3333333333',
            'grado' => 'Farmacia',
            'curso' => 2,
            'grupo' => 'M11'
        ]);
        Asignatura::create([
            'nombre' => 'Física',
            'codigo' => '3333333333',
            'grado' => 'Farmacia',
            'curso' => 2,
            'grupo' => 'M21'
        ]);
        //Medicina
        Asignatura::create([
            'nombre' => 'Física',
            'codigo' => '4444444444',
            'grado' => 'Medicina',
            'curso' => 2,
            'grupo' => 'M31'
        ]);
        Asignatura::create([
            'nombre' => 'Física',
            'codigo' => '4444444444',
            'grado' => 'Medicina',
            'curso' => 2,
            'grupo' => 'M41'
        ]);
        //Odontologia
        Asignatura::create([
            'nombre' => 'Física',
            'codigo' => '5555555555',
            'grado' => 'Odontologia',
            'curso' => 2,
            'grupo' => 'M12'
        ]);
        Asignatura::create([
            'nombre' => 'Física',
            'codigo' => '5555555555',
            'grado' => 'Odontologia',
            'curso' => 2,
            'grupo' => 'M22'
        ]);
        //Biotecnologia
        Asignatura::create([
            'nombre' => 'Matemáticas',
            'codigo' => '6666666666',
            'grado' => 'Biotecnologia',
            'curso' => 1,
            'grupo' => 'T12'
        ]);
        Asignatura::create([
            'nombre' => 'Matemáticas',
            'codigo' => '6666666666',
            'grado' => 'Biotecnologia',
            'curso' => 1,
            'grupo' => 'T22'
        ]);
    }
}

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
        Asignatura::create([
            'nombre' => 'Matemáticas',
            'codigo' => '1000000000',
            'grado' => 'Biotecnología',
            'curso' => 1,
            'grupo' => 'M11'
        ]);
        Asignatura::create([
            'nombre' => 'Física',
            'codigo' => '2000000000',
            'grado' => 'Farmacia',
            'curso' => 2,
            'grupo' => 'T12'
        ]);
        Asignatura::create([
            'nombre' => 'Química',
            'codigo' => '3000000000',
            'grado' => 'Enfermería',
            'curso' => 3,
            'grupo' => 'M41'
        ]);
    }
}

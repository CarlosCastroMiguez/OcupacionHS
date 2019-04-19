<?php

use Illuminate\Database\Seeder;
use App\Profesor;

class ProfesoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profesor::create([
            'nombre' => 'Borja',
            'apellido' => 'Rodriguez',
            'departamento' => 'departamento A'
            
        ]);
        Profesor::create([
            'nombre' => 'Rodrigo',
            'apellido' => 'Fernandez',
            'departamento' => 'departamento B'
            
        ]);
        Profesor::create([
            'nombre' => 'Federico',
            'apellido' => 'Gutierrez',
            'departamento' => 'departamento C'
            
        ]);
    }
}

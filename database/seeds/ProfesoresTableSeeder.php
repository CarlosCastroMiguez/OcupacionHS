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
            'nombre' => 'Lourdes',
            'apellido' => 'Martin Mendez',
            'departamento' => 'Hospital Simulado'
            
        ]);
        Profesor::create([
            'nombre' => 'Maria',
            'apellido' => 'Fuencisla Gilsanz',
            'departamento' => 'Hospital Simulado'
            
        ]);
        Profesor::create([
            'nombre' => 'Emilia',
            'apellido' => 'Condes Moreno',
            'departamento' => 'Hospital Simulado'
            
        ]);
        Profesor::create([
            'nombre' => 'Borja',
            'apellido' => 'Rodriguez Vila',
            'departamento' => 'TIC'
            
        ]);
    }
}

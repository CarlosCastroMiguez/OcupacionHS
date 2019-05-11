<?php

use Illuminate\Database\Seeder;
use App\TipoSala;

class TipoSalasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoSala::create([
            'nombre' => 'Hospitalización',
            
        ]);
        TipoSala::create([
            'nombre' => 'Apoyo',
            
        ]);
        TipoSala::create([
            'nombre' => 'Quirófano A 048',
            
        ]);
        TipoSala::create([
            'nombre' => 'Consulta',
            
        ]);
        TipoSala::create([
            'nombre' => 'Task Training',
            
        ]);
        TipoSala::create([
            'nombre' => 'Simulación Compleja',
            
        ]);
        TipoSala::create([
            'nombre' => 'Farmacia Hospital',
            
        ]);
        TipoSala::create([
            'nombre' => 'Farmacia Comunitaria',
            
        ]);
        TipoSala::create([
            'nombre' => 'Ambulancia',
            
        ]);
    }
}

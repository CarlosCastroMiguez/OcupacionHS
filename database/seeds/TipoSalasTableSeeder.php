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
            'nombre' => 'Consulta',
        ]);
        TipoSala::create([
            'nombre' => 'Simulación Compleja',
        ]);
        TipoSala::create([
            'nombre' => 'Task Training',
        ]);
        TipoSala::create([
            'nombre' => 'Hospitalización',
        ]);
        TipoSala::create([
            'nombre' => 'Farmacia',
        ]);
        TipoSala::create([
            'nombre' => 'Quirófano',
        ]);
        TipoSala::create([
            'nombre' => 'Farmacia Comunitaria',
        ]);
        TipoSala::create([
            'nombre' => 'Ambulancia',
        ]);
    }
}

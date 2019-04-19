<?php

use Illuminate\Database\Seeder;
use App\Simulador;

class SimuladoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Simulador::create([
            'nombre' => 'ISTAN',
        ]);
        Simulador::create([
            'nombre' => 'METI',
        ]);
        Simulador::create([
            'nombre' => 'SIMMAN',
        ]);
        Simulador::create([
            'nombre' => 'FIDELIS',
        ]);
        Simulador::create([
            'nombre' => 'OTROS',
        ]);
        
    }
}

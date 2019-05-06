<?php

use Illuminate\Database\Seeder;
use App\Sala;

class SalasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sala::create([
            'tipo' => 'Consulta',
            'capacidad' => 10
        ]);
        Sala::create([
            'tipo' => 'Quirófano',
            'capacidad' => 20
        ]);
        Sala::create([
            'tipo' => 'Task Training',
            'capacidad' => 30
        ]);
        Sala::create([
            'tipo' => 'Ambulancia',
            'capacidad' => 30
        ]);
        Sala::create([
            'tipo' => 'Farmacia',
            'capacidad' => 30
        ]);
        Sala::create([
            'tipo' => 'Farmacia',
            'capacidad' => 30
        ]);
        
    }
}

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
            'tipo' => 'Hospitalización',
            'capacidad' => 10
        ]);
        Sala::create([
            'tipo' => 'Apoyo',
            'capacidad' => 10
        ]);
        Sala::create([
            'tipo' => 'Quirófano A 048',
            'capacidad' => 10
        ]);
        Sala::create([
            'tipo' => 'Consulta 1',
            'capacidad' => 10
        ]);
        Sala::create([
            'tipo' => 'Consulta 2',
            'capacidad' => 20
        ]);
        Sala::create([
            'tipo' => 'Consulta 3',
            'capacidad' => 20
        ]);
        Sala::create([
            'tipo' => 'Consulta 4',
            'capacidad' => 20
        ]);
        Sala::create([
            'tipo' => 'Task Training',
            'capacidad' => 30
        ]);
        Sala::create([
            'tipo' => 'Simulación Compleja 1',
            'capacidad' => 30
        ]);
        Sala::create([
            'tipo' => 'Simulación Compleja 2',
            'capacidad' => 30
        ]);
        Sala::create([
            'tipo' => 'Simulación Compleja 3',
            'capacidad' => 30
        ]);
        Sala::create([
            'tipo' => 'Simulación Compleja 4',
            'capacidad' => 30
        ]);
        Sala::create([
            'tipo' => 'Farmacia Hospital',
            'capacidad' => 30
        ]);
        Sala::create([
            'tipo' => 'Farmacia Comunitaria',
            'capacidad' => 30
        ]);
        Sala::create([
            'tipo' => 'Ambulancia',
            'capacidad' => 30
        ]);
        
    }
}

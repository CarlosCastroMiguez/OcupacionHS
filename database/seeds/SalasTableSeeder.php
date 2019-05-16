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
            'tipo' => 'Hospital',
            'capacidad' => 10
        ]);
        Sala::create([
            'tipo' => 'TT',
            'capacidad' => 10
        ]);
        Sala::create([
            'tipo' => 'C1',
            'capacidad' => 10
        ]);
        Sala::create([
            'tipo' => 'C2',
            'capacidad' => 10
        ]);
        Sala::create([
            'tipo' => 'C3',
            'capacidad' => 20
        ]);
        Sala::create([
            'tipo' => 'C4',
            'capacidad' => 20
        ]);
        Sala::create([
            'tipo' => 'SC1',
            'capacidad' => 20
        ]);
        Sala::create([
            'tipo' => 'SC2',
            'capacidad' => 30
        ]);
        Sala::create([
            'tipo' => 'SC3',
            'capacidad' => 30
        ]);
        Sala::create([
            'tipo' => 'SC4',
            'capacidad' => 30
        ]);
        Sala::create([
            'tipo' => 'Apoyo',
            'capacidad' => 30
        ]);
        Sala::create([
            'tipo' => 'Q048',
            'capacidad' => 30
        ]);
        Sala::create([
            'tipo' => 'FC',
            'capacidad' => 30
        ]);
        Sala::create([
            'tipo' => 'FH',
            'capacidad' => 30
        ]);
        Sala::create([
            'tipo' => 'Ambulancia',
            'capacidad' => 30
        ]);
        
    }
}

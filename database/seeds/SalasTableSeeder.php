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
            'capacidad' => 40
        ]);
        Sala::create([
            'tipo' => 'TT',
            'capacidad' => 40
        ]);
        Sala::create([
            'tipo' => 'C1',
            'capacidad' => 40
        ]);
        Sala::create([
            'tipo' => 'C2',
            'capacidad' => 40
        ]);
        Sala::create([
            'tipo' => 'C3',
            'capacidad' => 40
        ]);
        Sala::create([
            'tipo' => 'C4',
            'capacidad' => 40
        ]);
        Sala::create([
            'tipo' => 'SC1',
            'capacidad' => 40
        ]);
        Sala::create([
            'tipo' => 'SC2',
            'capacidad' => 40
        ]);
        Sala::create([
            'tipo' => 'SC3',
            'capacidad' => 40
        ]);
        Sala::create([
            'tipo' => 'SC4',
            'capacidad' => 40
        ]);
        Sala::create([
            'tipo' => 'Apoyo',
            'capacidad' => 40
        ]);
        Sala::create([
            'tipo' => 'Q048',
            'capacidad' => 40
        ]);
        Sala::create([
            'tipo' => 'FC',
            
            'capacidad' => 40
        ]);
        Sala::create([
            'tipo' => 'FH',
            'capacidad' => 40
        ]);
        Sala::create([
            'tipo' => 'Ambulanc',
            'capacidad' => 40
        ]);
        
    }
}

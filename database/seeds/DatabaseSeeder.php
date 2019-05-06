<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(AsignaturasTableSeeder::class);
        $this->call(ProfesoresTableSeeder::class);
        $this->call(SalasTableSeeder::class);
        $this->call(SimuladoresTableSeeder::class);
        $this->call(TipoSalasTableSeeder::class);
        $this->call(EventosTableSeeder::class);
    }
}

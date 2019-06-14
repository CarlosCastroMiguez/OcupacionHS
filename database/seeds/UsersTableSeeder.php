<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    //php artisan db:seed --class=UsersTableSeeder

    public function run()
    {
        //admin
        User::create([
            'name'=> 'admin',
            'email'=> 'ocupacionuem@gmail.com',
            'password'=> bcrypt('administracion'),
            'role'=> 0
            
        ]);
        //client
        User::create([
            'name'=> 'client',
            'email'=> 'client@client.com',
            'password'=> bcrypt('client'),
            'role'=> 1
            
        ]);
    }
}

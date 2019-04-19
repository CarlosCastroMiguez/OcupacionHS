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
            'email'=> 'admin@admin.com',
            'password'=> bcrypt('admin'),
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

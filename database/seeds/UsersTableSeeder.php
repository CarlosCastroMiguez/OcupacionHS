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
        //support
        User::create([
            'name'=> 'support',
            'email'=> 'support@support.com',
            'password'=> bcrypt('support'),
            'role'=> 1
            
        ]);
        //client
        User::create([
            'name'=> 'client',
            'email'=> 'client@client.com',
            'password'=> bcrypt('client'),
            'role'=> 2
            
        ]);
    }
}

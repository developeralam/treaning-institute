<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
         [   'name' => 'Master',
            'role' => 2,
            'email' => 'mmit@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
          ], 
       
          [  'name' => 'CEO',
            'role' => 2,
            'email' => 'ceo@smartsoftwarebd.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
         ]
    ]);
    }
}

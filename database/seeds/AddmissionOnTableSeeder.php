<?php

use App\AddmissionOn;
use Illuminate\Database\Seeder;

class AddmissionOnTableSeeder extends Seeder{

    public function run(){
        AddmissionOn::insert([
            'image' => 'default.png',
            'slug' => 'test',
            ]);
    }
}
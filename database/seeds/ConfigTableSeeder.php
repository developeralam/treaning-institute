<?php

    use App\Configuration;

    use Illuminate\Database\Seeder;

class ConfigTableSeeder extends Seeder{

    public function run(){

        Configuration::where('data','Muslim')->update([
            'data' => 'Islam',
        ]);
        Configuration::create([
            'data' => 'O+',
            'bloodGroup'=> 1
        ]);
        Configuration::create([
            'data' => 'O-',
            'bloodGroup'=> 1
        ]);
    }
}

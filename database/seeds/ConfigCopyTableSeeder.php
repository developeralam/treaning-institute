<?php

use App\Configuration;
use Illuminate\Database\Seeder;

class ConfigCopyTableSeeder extends Seeder{

    public function run()
    {
        Configuration::where('id', 25)->where('data', 'O+')->update([
            'data' => 'O-',
            'bloodGroup' => 1
        ]);
    }
}
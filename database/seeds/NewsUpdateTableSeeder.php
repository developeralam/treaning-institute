<?php

use App\NewsUpdate;
use Illuminate\Database\Seeder;

class NewsUpdateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         NewsUpdate::insert([
            'title' => 'test',
            'image' => 'default.png',
            ]);
    }
}

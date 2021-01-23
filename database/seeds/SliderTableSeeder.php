<?php

use App\Slider;
use Illuminate\Database\Seeder;

class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Slider::insert([
            'title' => 'test',
            'slug' => 'slug',
            'image' => 'default.png',
            ]);
    }
}

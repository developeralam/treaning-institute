<?php

use App\AboutUs;
use Illuminate\Database\Seeder;

class AboutUsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutUs::insert([
            'title' => 'test',
            'about' => 'It is a test long established fact that a reader will be distracted by the readable content of a page when looking .',
            'image' => 'default.png',
            'link' => 'www.test.com',
            ]);
    }
}

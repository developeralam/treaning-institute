<?php

use App\Service;
use Illuminate\Database\Seeder;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Service::insert([
            'name' => 'test',
            'description' => 'It is a test long established fact that a reader will be distracted by the readable content of a page when looking .',
            // 'link' => 'test',
            'image' => 'default.png',
            ]);
    }
}

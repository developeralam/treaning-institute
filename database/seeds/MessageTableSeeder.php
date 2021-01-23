<?php

use App\Message;
use Illuminate\Database\Seeder;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         Message::insert([
            'name' => 'Chairman',
            'desc' => 'It is a test long established fact that a reader will be distracted by the readable content of a page when looking .',
            'by' => 'Principal',
            'image' => 'default.png',
            ]);
    }
}

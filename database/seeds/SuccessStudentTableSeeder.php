<?php

use App\SuccessStu;
use Illuminate\Database\Seeder;

class SuccessStudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SuccessStu::insert([
            'name' => 'test',
            'post' => 'It is a test long established fact that a reader will be distracted by the readable content of a page when looking .',
            'image' => 'default.png',
            ]);
    }
}

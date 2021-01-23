<?php

use App\NoticeBoard;
use Illuminate\Database\Seeder;

class NoticeBoardTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          NoticeBoard::insert([
            'title' => 'test',
            'description' => 'test',
            'file' => 'default.png',
            ]);
    }
}

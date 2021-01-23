<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{
    public function run(){
        $this->call(UsersTableSeeder::class);
        $this->call(SiteConfTableSeeder::class);
        $this->call(NewsUpdateTableSeeder::class);
        $this->call(ConfigurationTableSeeder::class);
        $this->call(MessageTableSeeder::class);
        $this->call(SliderTableSeeder::class);
        $this->call(AboutUsTableSeeder::class);
        $this->call(SuccessStudentTableSeeder::class);
        $this->call(AddmissionOnTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(NoticeBoardTableSeeder::class);
        $this->call(ConfigTableSeeder::class);
        $this->call(configCopyTableSeeder::class);
    }
}

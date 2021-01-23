<?php

namespace App\Providers;

use App\Course;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191); //NEW: Increase StringLength

        $training_courses = Schema::hasTable('courses');
        if($training_courses === true){
            $training_courses        = Course::get();
            $data = [];
            $data['training_courses'] = $training_courses;
            View::share($data);
        }


    }
}

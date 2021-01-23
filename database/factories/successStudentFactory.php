<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SuccessStu;
use Faker\Generator as Faker;

$factory->define(SuccessStu::class, function (Faker $faker) {
    return [
         'name' => $faker->name,
         'post' => $faker->post,
         'image' => $faker->image('uploads/successstudent',400,300, null, false),
         
    ];
});

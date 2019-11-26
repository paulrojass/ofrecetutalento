<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Talent;
use Faker\Generator as Faker;

$array = [1,2,3,4,5];

$factory->define(Talent::class, function (Faker $faker) {
    return [
    	'title' => $faker->jobTitle,
    	'description' => $faker->realText(50,5),
    	'level' => $faker->randomDigit,
		'user_id' => App\User::all(['id'])->random(),
    	'category_id' => App\Category::all(['id'])->random()
    ];
});

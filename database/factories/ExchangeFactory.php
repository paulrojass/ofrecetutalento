<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Exchange;
use Faker\Generator as Faker;

$factory->define(Exchange::class, function (Faker $faker) {
    return [
    	'title' => $faker->productName,
    	'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
    	'image' => 'default.jpg',
		'price' => $faker->numberBetween($min = 1000, $max = 9000)
    ];
});

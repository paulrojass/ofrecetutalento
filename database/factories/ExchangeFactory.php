<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Exchange;
use Faker\Generator as Faker;

$factory->define(Exchange::class, function (Faker $faker) {
    return [
    	'title' => $faker->productName,
    	'description' => $faker->realText(50,5),
    	'image' => 'images/exchanges/default.jpg',
		'price' => $faker->numberBetween($min = 1000, $max = 9000),
    	'talent_id' => App\Talent::all(['id'])->random()
    ];
});

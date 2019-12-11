<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Language;

use Faker\Generator as Faker;

$factory->define(Language::class, function (Faker $faker) {
	$array = ['Ingles', 'Frances', 'Portugues', 'Aleman', 'Ruso'];
	$lenguaje = Arr::random($array);

	return [
		'language' => $lenguaje,
		'level' => $faker->randomDigit
	];
});

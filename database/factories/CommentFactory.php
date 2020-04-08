<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
	$rating = [1,2,3,4,5];
	$valoracion = Arr::random($rating);
    return [
        'comment' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
		/*'user_id' => App\User::all(['id'])->random(),*/
		'value' => $valoracion
    ];
});

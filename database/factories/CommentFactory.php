<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'comment' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
		'user_id' => App\User::all(['id'])->random()
    ];
});

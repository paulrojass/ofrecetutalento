<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dealing;
use Faker\Generator as Faker;

$factory->define(Dealing::class, function (Faker $faker) {
    return [
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'exchange_proposal' => App\Exchange::all(['id'])->random(),
        'propose_id' => App\User::all(['id'])->random()
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Suscription;
use Faker\Generator as Faker;
use Carbon\Carbon;

$array = [2,3,4];

$factory->define(Suscription::class, function (Faker $faker) {
    return [
		'update_date' => Carbon::now()->add(1, 'year'),
		'plan_id' => App\Plan::all(['id'])->random($array),
		'user_id' => App\User::all(['id'])->random()
    ];
});

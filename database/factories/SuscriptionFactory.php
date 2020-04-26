<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Suscription;
use Faker\Generator as Faker;
use Carbon\Carbon;

$array = [2,3,4];


$factory->define(Suscription::class, function (Faker $faker) {
	$hoy = new Date();
    return [
		'expiration_date' => $hoy->addYear(1),
		'plan_id' => App\Plan::all(['id'])->random()
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Experience;

use Faker\Generator as Faker;

$factory->define(Experience::class, function (Faker $faker) {
    return [
		'company1' => $faker->company,
		'position1' => $faker->jobTitle,
		'start_date1' => $faker->year($max = 'now'),
		'due_date1' => $faker->year($max = 'now'),
		'achievements1' => $faker->realText(50,5),
		'company2' => $faker->company,
		'position2' => $faker->jobTitle,
		'start_date2' => $faker->year($max = 'now'),
		'due_date2' => $faker->year($max = 'now'),
		'achievements2' => $faker->realText(50,5),
		'company3' => $faker->company,
		'position3' => $faker->jobTitle,
		'start_date3' => $faker->year($max = 'now'),
		'due_date3' => $faker->year($max = 'now'),
		'achievements3' => $faker->realText(50,5)
    ];
});

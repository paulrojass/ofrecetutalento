<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'lastname' => $faker->name,
        'nationality' => $faker->nationality,
        'nationality' => $faker->nationality,
        'address' => $faker->realText(50,5),
        'city' => $faker->city,
        'country' => $faker->country,
        'document' => '123456789',
        'phone' => '04247672189',
		'abilities' => $faker->realText(50,5),
        'email' => $faker->unique()->safeEmail,

        'email_verified_at' => now(),
        'password' => bcrypt('123456789'), // password
        'remember_token' => Str::random(10),
    ];
});
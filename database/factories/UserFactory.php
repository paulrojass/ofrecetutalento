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
        'name' => $faker->firstNameMale,
        'lastname' => $faker->lastname,
        'nationality' => $faker->country,
        'address' => $faker->address,
        'city' => $faker->city,
        'country' => $faker->country,
        'document' => '123456789',
        'phone' => $faker->phoneNumber,
		'abilities' => $faker->realText(50,5),
        'email' => $faker->unique()->safeEmail,
        'avatar' => 'images/users/default.png',

        'email_verified_at' => now(),
        'password' => bcrypt('secret'), // password
        'remember_token' => Str::random(10),
    ];
});
<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dealing;
use App\Exchange;
use Faker\Generator as Faker;

$factory->define(Dealing::class, function (Faker $faker) {

	$name = null;
	$ideal = null;
	$plus = null;
	$value = null;
	$exchange_days = $faker->numberBetween($min = 1, $max = 60);
	$proposal_days = null;
	$quantity = null;
	$pay = 0;


	$exchange_id = App\Exchange::all(['id'])->random()->id;
	$proposal_id = null;

	$canje = rand(0,1);

	if($canje == 0){
		$exchange_id = null;
		$name = $faker->productName;
		$ideal = $faker->sentence($nbWords = 6, $variableNbWords = true);
		$plus = $faker->sentence($nbWords = 6, $variableNbWords = true);
		$value = $faker->numberBetween($min = 1000, $max = 9000);
		$quantity = $faker->numberBetween($min = 1, $max = 60);
	}else
	{
		$pay = rand(0,1);
		if($pay == 0){
			$proposal_id = App\Exchange::all(['id'])->random()->id;
			$proposal_days = $faker->numberBetween($min = 1, $max = 60);
		}


	}

    return [
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'name' => $name,
        'exchange_id' => $exchange_id,
        'proposal_id' => $proposal_id,
        'ideal' => $ideal,
        'plus' => $plus,
        'value' => $value,
        'exchange_days' => $exchange_days,
        'proposal_days' => $proposal_days,
        'pay' => $pay,
        'quantity' => $quantity,
        'accept_id' => App\User::all(['id'])->random()
    ];
});

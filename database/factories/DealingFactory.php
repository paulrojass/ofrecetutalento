<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dealing;
use App\Exchange;
use App\User;
use Faker\Generator as Faker;

$factory->define(Dealing::class, function (Faker $faker) {

	$name = null;
	$ideal = null;
	$plus = null;
	$value = null;
	$exchange_days = $faker->numberBetween($min = 1, $max = 60);
	$quantity = null;
	$pay = 0;
	$proposal_days = null;
	$name_proposal = null;
	$description_proposal = null;


	$exchange_id = App\Exchange::all(['id'])->random()->id;
	$proposal_id = null;

	$canje_solciitado = rand(0,1);
	if($canje_solciitado == 0){
		$exchange_id = null;
		$name = $faker->productName;
		$ideal = $faker->sentence($nbWords = 6, $variableNbWords = true);
		$plus = $faker->sentence($nbWords = 6, $variableNbWords = true);
		$value = $faker->numberBetween($min = 1000, $max = 9000);
		$quantity = $faker->numberBetween($min = 1, $max = 60);
	}


	$pay = rand(0,1);
	if($pay == 0){
		$canje_propuesto = rand(0,1);
		if($canje_propuesto == 1)
		{
			$proposal_days = $faker->numberBetween($min = 1, $max = 60);
			$proposal_id = App\Exchange::all(['id'])->random()->id;
		}else
		{
			$name_proposal = $faker->productName;
			$description_proposal = $faker->paragraph($nbSentences = 3, $variableNbSentences = true);
		}
	}

    return [
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'name_proposal' => $name_proposal,
        'description_proposal' => $description_proposal,
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
        'received' => 0,
        'accept_id' => App\User::all(['id'])->random()
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\File;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$factory->define(File::class, function (Faker $faker) {

	$array = ['image', 'video', 'pdf'];

	$type = Arr::random($array);

	if($type == 'image') $file = 'jpg';
	if($type == 'video') $file = 'mp4';
	if($type == 'pdf') $file = 'pdf';

	return [
		'location' => 'files/'.$type.'/default.'.$file,
		'type' => $type,
		'exchange_id' => App\Exchange::all(['id'])->random()
	];
});

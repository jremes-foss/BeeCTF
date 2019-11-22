<?php

use Faker\Generator as Faker;

$factory->define(App\Solved::class, function (Faker $faker) {
    return [
    	'challenge_id' => 1,
    	'user_id' => 1
    ];
});

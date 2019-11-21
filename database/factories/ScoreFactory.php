<?php

use Faker\Generator as Faker;

$factory->define(App\Score::class, function (Faker $faker) {
    return [
    	'user_id' => 1,
    	'score' => 400
    ];
});

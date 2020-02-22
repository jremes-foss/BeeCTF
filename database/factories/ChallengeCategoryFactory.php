<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\ChallengeCategory::class, function (Faker $faker) {
    return [
        'category_id' => 1,
        'challenge_id' => 1
    ];
});

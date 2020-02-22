<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(ChallengeCategory::class, function (Faker $faker) {
    return [
        'category_id' => 1,
        'challenge_id' => 1
    ];
});

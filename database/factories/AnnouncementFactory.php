<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Announcement::class, function (Faker $faker) {
    return [
        'title' => 'Test Title',
        'content' => $faker->sentence
    ];
});

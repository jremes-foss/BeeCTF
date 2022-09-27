<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Announcement;

$factory->define(Announcement::class, function (Faker $faker) {
    return [
        'title' => 'Test Title',
        'content' => $faker->sentence
    ];
});

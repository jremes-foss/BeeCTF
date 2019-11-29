<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'category' => 'Test Category',
        'description' => 'This is a test category'
    ];
});

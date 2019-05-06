<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Challenges::class, function (Faker $faker) {
    return [
        'category' => 'Crypto',
        'score' => '350',
        'title' => $faker->sentence,
        'flag' => 'FLAG{' . $faker->word . '}',
        'content' => $faker->paragraph
    ];
});

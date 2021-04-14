<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TeamPlayer;
use Faker\Generator as Faker;

$factory->define(TeamPlayer::class, function (Faker $faker) {
    return [
        'player_id' => 1,
        'team_id' => 1
    ];
});

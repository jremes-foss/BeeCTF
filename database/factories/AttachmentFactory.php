<?php

use Faker\Generator as Faker;

$factory->define(App\Attachment::class, function (Faker $faker) {
    return [
    	'challenge_id' => 2,
    	'filename' => 'public/challenges/test.zip',
    	'url' => 'http://127.0.0.1:1337/index.php'
    ];
});

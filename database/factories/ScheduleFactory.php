<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Schedule;
use Faker\Generator as Faker;

$factory->define(Schedule::class, function (Faker $faker) {
    return [
        'organisation' => $faker->company(),
        'location' => $faker->address(),
        'item' => 'Letter',
        'letter_title' => 'Default',
        'unit_id' => 4,
        'user_id' => 3,
    ];
});

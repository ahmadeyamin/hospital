<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Bed;
use Faker\Generator as Faker;

$factory->define(Bed::class, function (Faker $faker) {
    return [
        'bed_no' => $faker->numberBetween(100, 999),
        'floor' => $faker->randomElement(['2nd', '3rd', '1st']),
        'ward' => $faker->randomElement(['normal', 'XrZ', 'PNy']),
    ];
});

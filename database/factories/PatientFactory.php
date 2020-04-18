<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Patient;
use Faker\Generator as Faker;

$factory->define(Patient::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'gender' => 'male',
        'address' => $faker->address,
        'mobileno' => $faker->phoneNumber,
        'age' => $faker->numberBetween(5,30),
    ];
});

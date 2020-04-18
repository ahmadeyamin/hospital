<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Staff;
use Faker\Generator as Faker;

$factory->define(Staff::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'role' => 'doctor',
        'phone' => $faker->phoneNumber,
        'gender' => 'male',
        'c_address' => $faker->address,
    ];
});

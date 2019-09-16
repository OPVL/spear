<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Target;
use Faker\Generator as Faker;

$factory->define(Target::class, function (Faker $faker) {
    return [
        'email' => $faker->unique()->safeEmail,
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName,
    ];
});

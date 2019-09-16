<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Email;
use Faker\Generator as Faker;

$factory->define(Email::class, function (Faker $faker) {
    return [
        'sender' => $faker->unique()->safeEmail,
        'subjec' => $faker->sentence(4)
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\FakeEmail;
use Faker\Generator as Faker;

$factory->define(FakeEmail::class, function (Faker $faker) {
    return [
        'sender' => $faker->unique()->safeEmail,
        'subjec' => $faker->sentence(4)
    ];
});

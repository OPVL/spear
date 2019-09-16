<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Spear;
use Faker\Generator as Faker;

$factory->define(Spear::class, function (Faker $faker) {
    return [
        'hash' => $faker->uuid
    ];
});

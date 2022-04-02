<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Method;
use Faker\Generator as Faker;

$factory->define(Method::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(2),
    ];
});

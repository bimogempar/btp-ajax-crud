<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use App\Method;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(5),
        'start_date' => $faker->dateTimeBetween('-1 years', '+1 years'),
        'end_date' => $faker->dateTimeBetween('-1 years', '+1 years'),
    ];
});

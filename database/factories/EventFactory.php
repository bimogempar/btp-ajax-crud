<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Event;
use App\Method;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    $start = $faker->dateTimeBetween('-3 month', '+2 month');
    return [
        'name' => $faker->sentence(5),
        'start_date' => $start,
        'end_date' => $faker->dateTimeBetween($start, $start->format('Y-m-d H:i:s') . ' +2 days'),
    ];
});

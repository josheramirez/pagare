<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Prevision::class, function (Faker $faker) {
    return [
        'nombre' => $faker->bs
    ];
});

<?php

use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\App\Servicio::class, function (Faker $faker) {
    return [
        'nombre' => $faker->company
    ];
});

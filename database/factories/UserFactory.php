<?php

use Faker\Generator as Faker;
use Freshwork\ChileanBundle\Rut;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    for($i = 0; $i < 10; $i++)
    {
        //generate random number between 1.000.000 and 25.000.000
        $random_number = rand(1000000, 25000000);

        //We create a new RUT wihtout verification number (the second paramenter of Rut constructor)
        $rut = new Rut($random_number);
    }

    $nombre = $faker->firstName;
    $paterno = $faker->lastName;
    $materno = $faker->lastName;

    return [
        'nombre' => $nombre,
        'paterno' => $paterno,
        'materno' => $materno,
        'full_nombre' => "$nombre $paterno $materno",
        'rut' => $rut->fix()->format(),
        'username' => $faker->userName,
        'password' => 'secret',
        'rol_id' => 2,
        'remember_token' => str_random(10),
    ];
});

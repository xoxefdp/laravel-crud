<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Persona::class, function (Faker\Generator $faker) {

    return [
        'nombres' => $faker->name,
        'apellidos' => $faker->lastName,
        'cedula' => $faker->unique()->numberBetween($min = 1, $max = 99999999),
        'correo' => $faker->unique()->safeEmail,
        'telefono' => $faker->numerify('### #######'),
        // 'telefono' => $faker->tollFreePhoneNumber,
        'remember_token' => str_random(10),
    ];
});

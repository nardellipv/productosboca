<?php

use Faker\Generator as Faker;


$factory->define(productosboca\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'lastname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'type' => $faker->randomElement(['ADMIN', 'CLIENT']),
        'email_verified_at' => now(),
        'password' => bcrypt(123),
        'remember_token' => str_random(10),
    ];
});

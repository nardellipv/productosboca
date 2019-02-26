<?php

use Faker\Generator as Faker;


$factory->define(productosboca\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'lastname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
        'state' => $faker->city,
        'city' => $faker->locale,
        'postalcode' => rand(1000,9999),
        'phone' => $faker->phoneNumber,
        'type' => $faker->randomElement(['ADMIN', 'CLIENT']),
        'email_verified_at' => now(),
        'password' => bcrypt(123),
        'remember_token' => str_random(10),
    ];
});

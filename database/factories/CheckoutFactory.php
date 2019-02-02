<?php

use Faker\Generator as Faker;

$factory->define(productosboca\Checkout::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'lastname' => $faker->lastName,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'province' => $faker->state,
        'city' => $faker->city,
        'address' => $faker->address,
        'zip' => $faker->numberBetween('1000','9999'),
        'note' => $faker->text(100),
        'payment_id' => $faker->numberBetween('1','4'),
    ];
});

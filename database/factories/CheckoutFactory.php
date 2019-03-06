<?php

use Faker\Generator as Faker;

$factory->define(bocaamerica\Checkout::class, function (Faker $faker) {
    return [
        'email' => $faker->email,
        'name' => $faker->name,
        'lastname' => $faker->lastName,
        'address' => $faker->address,
        'state' => $faker->state,
        'city' => $faker->city,
        'postalcode' => $faker->numberBetween('1000','9999'),
        'phone' => $faker->phoneNumber,
        'note' => $faker->text(100),
        'status' =>$faker->randomElement(['EN PROCESO','COMPRA','ENVIADO','CANCELADO']),
        'payment' => $faker->creditCardType,
        'serial_buy'=>$faker->md5,
    ];
});

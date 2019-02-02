<?php

use Faker\Generator as Faker;

$factory->define(productosboca\NewsLetter::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
    ];
});

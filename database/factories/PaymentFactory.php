<?php

use Faker\Generator as Faker;

$factory->define(productosboca\Payment::class, function (Faker $faker) {
    return [
        'name' => $faker->creditCardType,
        'note' => $faker->text(100),
    ];
});

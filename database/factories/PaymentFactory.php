<?php

use Faker\Generator as Faker;

$factory->define(bocaamerica\Payment::class, function (Faker $faker) {
    return [
        'name' => $faker->creditCardType,
        'note' => $faker->text(100),
    ];
});

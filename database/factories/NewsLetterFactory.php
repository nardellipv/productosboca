<?php

use Faker\Generator as Faker;

$factory->define(bocaamerica\NewsLetter::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
    ];
});

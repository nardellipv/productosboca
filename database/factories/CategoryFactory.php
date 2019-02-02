<?php

use Faker\Generator as Faker;

$factory->define(productosboca\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->paragraph(1),
        'status' => $faker->randomElement(['ACTIVE', 'DESACTIVE']),
    ];
});

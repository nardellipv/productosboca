<?php

use Faker\Generator as Faker;

$factory->define(productosboca\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->paragraph(2),
        'price' => $faker->randomNumber(3),
        'offer' => $faker->randomNumber(3),
        'quantity' => $faker->randomNumber(3),
        'time_offer' => $faker->time('H:m:s','now'),
        'cupon_code' => $faker->paragraph(1),
        'category_id' => rand(1, 4),
    ];
});

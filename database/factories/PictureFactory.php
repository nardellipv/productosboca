<?php

use Faker\Generator as Faker;

$factory->define(productosboca\Picture::class, function (Faker $faker) {
    return [
        'name' => $faker->paragraph(1),
        'url' => $faker->imageUrl($width = 640, $height = 480),
        'product_id' => rand(1, 100),
    ];
});

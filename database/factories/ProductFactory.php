<?php

use Faker\Generator as Faker;

$factory->define(bocaamerica\Product::class, function (Faker $faker) {
    $name = $faker->sentence(2);
    return [
        'name' => $name,
        'price' => $faker->randomNumber(3),
        'offer' => $faker->randomNumber(3),
        'quantity' => $faker->randomNumber(3),
        'description' => $faker->paragraph(2),
        'section' => $faker->randomElement(['BANNER', 'NEW', 'MOSTSELL', 'OTHER']),
        'photo' => $faker->imageUrl($width = 640, $height = 480),
        'rating' => $faker->numberBetween('0', '100'),
        'slug' => str_slug($name),
        'time_offer' => $faker->dateTimeBetween('now','+1 year'),
        'category_id' => rand(1, 4),
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(bocaamerica\Category::class, function (Faker $faker) {
    $name = $faker->sentence(1);
    return [
        'name' => $name,
        'status' => $faker->randomElement(['ACTIVE', 'DESACTIVE']),
        'slug' => str_slug($name),
    ];
});

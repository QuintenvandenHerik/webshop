<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 20),
    ];
});

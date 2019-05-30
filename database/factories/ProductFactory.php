<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
	$category = array('nature', 'technology', 'metal', 'abstract', 'miscellaneous');
    return [
        'name' => $faker->word,
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 20),
        'category' => $category[array_rand($category, 1)]
    ];
});

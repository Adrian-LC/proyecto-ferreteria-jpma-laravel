<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name_p' => $faker->firstName,
        'price_p' => $faker->numberBetween($min = 1000, $max = 100000),
        'offer' => $faker->numberBetween($min = 0, $max = 30),
        'detail' => $faker->text($maxNbChars = 300),
        'poster' => "pintura.jpg",
        'stock' => $faker->numberBetween($min = 0, $max = 20),
        'new' => $faker->numberBetween($min = 0, $max = 1),
        'state_p' => $faker->numberBetween($min = 0, $max = 1),
        'total_purchased' => 0,
        'product_category_id' => $faker->numberBetween($min = 1, $max = 5)
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product_category;
use Faker\Generator as Faker;

$factory->define(Product_category::class, function (Faker $faker) {
    return [
        'name_pc' => $faker->unique()->firstName,
        'state_pc' => 1
    ];
});

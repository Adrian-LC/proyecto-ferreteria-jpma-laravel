<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Frequent_question;
use Faker\Generator as Faker;

$factory->define(Frequent_question::class, function (Faker $faker) {
    return [
        'question' => "¿".$faker->text($maxNbChars = 50)."?",
        'answer' => $faker->text($maxNbChars = 400),
    ];
});

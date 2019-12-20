<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    $dir = storage_path('app/public/avatar');
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        // 'email_verified_at' => now(),
        'password' => Hash::make('12345678'),
        'avatar' => basename($faker->image($dir, 800, 600, 'people', true, false)),
        'state_u' => 1,
        'user_category_id' => $faker->numberBetween($min = 2, $max = 3),
        // 'remember_token' => Str::random(10),
    ];
});

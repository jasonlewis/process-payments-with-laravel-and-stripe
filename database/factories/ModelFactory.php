<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->username,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->randomElement([
            'Xbox', 'PlayStation', 'Nintendo 64', 'Super Nintendo',
            'Sega', 'GameBoy', '3DS'
        ]),
        'price' => $faker->randomFloat(2, 50, 500)
    ];
});

$factory->define(App\Cart::class, function (Faker\Generator $faker) {
    return [
        'product_id' => $faker->numberBetween(1, 10),
        'quantity' => $faker->numberBetween(1, 3)
    ];
});

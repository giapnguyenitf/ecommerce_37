<?php

$factory->define(App\Models\Rating::class, function (Faker\Generator $faker) {
    return [
        'user_id' => App\Models\User::get()->random()->id,
        'product_id' => App\Models\Product::get()->random()->id,
        'stars' => $faker->numberBetween(1, 5),
        'messages' => str_random(50),
    ];
});

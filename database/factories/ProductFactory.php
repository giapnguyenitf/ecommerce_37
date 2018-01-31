<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'category_id' => App\Models\Category::get()->random()->id,
        'name' => $faker->name,
        'description' => str_random(50),
        'price' => $faker->randomDigit,
        'discount' => $faker->randomFloat(2, 0, 1.0),
        'star_rating' => $faker->numberBetween(1, 5),
        'status' => $faker->randomElement(array(true, false)),
        'manufacturer' => $faker->name,
    ];
});

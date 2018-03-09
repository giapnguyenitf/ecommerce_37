<?php

use Faker\Generator as Faker;

$factory->define(App\Models\OrderDetail::class, function (Faker $faker) {
    return [
        'order_id' => App\Models\OrderDetail::get()->random()->id,
        'product_id' => App\Models\OrderDetail::get()->random()->id,
        'color_id' => App\Models\Color::get()->random()->id,
        'quantity' => $faker->numberBetween(1, 5),
        'status' => $faker->numberBetween(0, 3),
    ];
});

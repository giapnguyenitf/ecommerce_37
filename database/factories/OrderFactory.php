<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Order::class, function (Faker $faker) {
    $product = App\Models\Product::get()->random();

    return [
        'user_id' => App\Models\User::get()->random()->id,
        'product_id' => $product->id,
        'payment_id' => App\Models\Payment::get()->random()->id,
        'color_id' => $product->colorProducts->random()->color_id,
        'number' => $product->colorProducts->random()->number,
        'status' => config('setting.waiting_for_process'),
    ];
});

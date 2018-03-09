<?php

$factory->define(App\Models\Order::class, function (Faker\Generator $faker) {

    return [
        'user_id' => App\Models\User::get()->random()->id,
        'payment_id' => App\Models\Payment::get()->random()->id,
        'status' => $faker->numberBetween(0, 3),
    ];
});

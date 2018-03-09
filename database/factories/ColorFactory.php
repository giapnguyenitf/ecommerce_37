<?php

$factory->define(App\Models\Color::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->colorName,
    ];
});

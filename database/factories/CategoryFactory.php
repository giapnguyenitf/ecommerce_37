<?php

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => str_random(10),
    ];
});

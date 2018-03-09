<?php

$factory->define(App\Models\Brand::class, function (Faker\Generator $faker) {
    return [
        'name' => str_random(10),
    ];
});

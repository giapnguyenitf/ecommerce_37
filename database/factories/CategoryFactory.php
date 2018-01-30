<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        'name' => str_random(10),
        'parent_id' => config('setting.is_parent_category'),
    ];
});

<?php

$factory->define(App\Models\Payment::class, function (FaFaker\Generatorker $faker) {
    return [
        'name' => str_random(10),
        'allowed' => true,
    ];
});

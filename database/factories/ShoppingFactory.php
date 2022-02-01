<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Shopping;
use Faker\Generator as Faker;

$factory->define(Shopping::class, function (Faker $faker) {
    return [
        'user_id'=>rand(2,10),
        'product_id'=>rand(1,20),
    ];
});

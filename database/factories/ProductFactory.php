<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name'=>$faker->sentence($nbWords = 2),
        'price' =>rand(0,1000)/4,
        'fiscal_tax'=>rand(5,20)
    ];
});

<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'title'=>$faker->word(),
        'description'=>$faker->paragraph(),
        'price'=>$faker->numberBetween($min = 1, $max = 9999,99),
        'size'=>$faker->numberBetween($min = 1, $max = 4),
        'status'=>$faker->numberBetween($min = 1, $max = 2),
        'code'=>$faker->numberBetween($min = 1, $max = 2),
        'reference'=>$faker->isbn10
    ];
});

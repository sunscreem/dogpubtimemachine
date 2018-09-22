<?php

use App\Beer;
use Faker\Generator as Faker;

$factory->define(Beer::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'brewery'=> $faker->randomElement(['Acme Brewery','Dave Garden Shed Brewery','Skunk Factory Brewery']),
    ];
});

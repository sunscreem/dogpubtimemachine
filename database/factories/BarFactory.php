<?php

use App\Bar;
use Faker\Generator as Faker;

$factory->define(Bar::class, function (Faker $faker) {
    return [
            'name'         => $faker->name,
            'bar_url'      => $faker->url(),
            'territory'    => $faker->randomElement(['UK', 'USA', 'International']),
            'tap_list_url' => $faker->url(),
         ];
});

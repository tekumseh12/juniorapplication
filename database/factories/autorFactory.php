<?php

use Faker\Generator as Faker;

$factory->define(App\autor::class, function (Faker $faker) {
    return [
        'meno'=>$faker->name,
        
    ];
});

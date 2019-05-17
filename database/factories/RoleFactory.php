<?php

use Faker\Generator as Faker;

$factory->define(App\Role::class, function (Faker $faker) {
    return [
        'name'=>'User',
        'description'=>$faker->paragrphs(rand(2,4),true)
    ];
});

<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\projet;
use Faker\Generator as Faker;

$factory->define(projet::class, function (Faker $faker) {
    return [
        'libelle'=>$faker->company,
        'description'=>$faker->text,
        'creer_par'=>$faker->numberBetween(1,10),
    ];
});

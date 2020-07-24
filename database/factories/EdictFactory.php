<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Edict;
use Illuminate\Support\Str;
use Faker\Generator as Faker;


/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Edict::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 3),
        'description' => $faker->text(),
        'started_at' => $faker->date(),
        'ended_at' => $faker->date(),

    ];
});

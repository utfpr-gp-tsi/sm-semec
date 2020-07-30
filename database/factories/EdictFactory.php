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
        'title' => $faker->name(),
        'description' => $faker->text(),
        'started_at' => $faker->dateTimeBetween('now', '+01 days'),
        'ended_at' => $faker->dateTimeBetween('+02 days', '+04 days')
    ];
});

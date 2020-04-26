<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\License;
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

$factory->define(License::class, function (Faker $faker) {
    return [
        'registration' => $faker->randomNumber(),
        'start_date' => $faker->date(),
        'finish_date' => $faker->date(),
        'license_type' => $faker->text(),
        'days' => $faker->randomNumber(),
        'servant_id' => factory(App\Servant::class),
    ];
});

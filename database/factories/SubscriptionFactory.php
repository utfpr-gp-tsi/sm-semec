<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Subscription;
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

$factory->define(Subscription::class, function (Faker $faker) {
    return [
        'title' => $faker->name(),
        'removal_type' => $faker->radio(),
        'interest_unit' => $faker->text(),
        'reason' => $faker->text(),
    ];
});

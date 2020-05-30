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
        'started_at' => $faker->date(),
        'ended_at' => $faker->date(),
        'license_type' => $faker->text(),
        'days' => $faker->randomNumber(),
        'contract_id' => factory(App\Contract::class),
    ];
});

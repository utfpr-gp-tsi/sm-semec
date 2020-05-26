<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Contract;
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

$factory->define(Contract::class, function (Faker $faker) {
    return [
        'registration' => $faker->randomNumber(),
        'admission_at' => $faker->date(),
        'termination_at' => $faker->date(),
        'secretary' => $faker->name(15),
        'place' => $faker->name(10),
        'role' => $faker->name(10),
        'link' => $faker->name(10),
        'servant_id' => factory(App\Servant::class),
    ];
});

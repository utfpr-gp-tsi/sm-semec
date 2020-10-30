<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Models\Subscription;
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
        'name' => $faker->text(),
        'registration' => $faker->text(),
        'removal_type' => $faker->radio(),
        'interest_unit' => $faker->text(),
        'reason' => $faker->text(),
        'servant_id' => factory(App\Servant::class),
        'contract_id' => factory(App\Contract::class),
        'removal_id' => factory(App\Removal::class),
    ];
});
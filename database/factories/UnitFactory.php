<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Unit;
use App\UnitCategory;
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

$factory->define(Unit::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'address' => $faker->unique()->streetaddress,
        'phone' => $faker->unique()->phoneNumber,
        'category_id' => factory(App\UnitCategory::class),
    ];
});

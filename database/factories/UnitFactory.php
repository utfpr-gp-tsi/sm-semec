<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Unit;
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
        'name' => $faker->name(),
        'address' => $faker->address(10),
        'phone' => $faker->randomNumber(),//$faker->tollFreePhoneNumber(),
        'category_id' => 0, // >>>> coloquei zero como valor padrão, se vc não passar 'category_id' então a Unit será associada à categoria zero.
    ];
});
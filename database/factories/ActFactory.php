<?php
 
/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Act;
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
 
$factory->define(Act::class, function (Faker $faker) {
    return [
        'act' => $faker->text(),
        'start' => $faker->date(),
        'validaty' => $faker->date(),
        'number' => $faker->randomNumber(),
        'time' => $faker->randomNumber(),
        'contract_id' => rand(1, 2),
    ];
});

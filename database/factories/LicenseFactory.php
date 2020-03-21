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
        'start date' => $faker->date(),
        'finish date' => $faker->date(),
        'license type' => $faker->text(),
        'days' => $faker->date(),
        'servant_id' => rand(1, 2),
    ];
});

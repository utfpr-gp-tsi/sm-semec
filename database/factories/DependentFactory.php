<?php
 
/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Dependent;
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
 
$factory->define(Dependent::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'birth' => $faker->date(),
        'degree' => $faker->text(),
        'study' => $faker->text(),
        'works' => $faker->text(),
        'servant_id' => rand(1, 2),
    ];
});

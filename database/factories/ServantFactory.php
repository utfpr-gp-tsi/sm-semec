<?php
 
/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Servant;
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
 
$factory->define(Servant::class, function (Faker $faker) {
    return [
        'servant' => $faker->name(),
        'registration' => $faker->randomNumber(),
        'birth' => $faker->date(),
        'natural from' => $faker->text(),
        'marital status' => $faker->text(),
        'mother name' => $faker->name(),
        'father name' => $faker->name(),
        'CPF' => $faker->randomNumber(),
        'RG' => $faker->randomNumber(),
        'PIS' => $faker->randomNumber(),
        'CTPS' => $faker->randomNumber(),
        'title' => $faker->text(),
        'address' => $faker->address(10),
        'phone' => $faker->randomNumber(),//$faker->tollFreePhoneNumber(),
        'email' => $faker->email(),
    ];
});

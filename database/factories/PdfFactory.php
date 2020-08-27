<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pdf;
use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;

$factory->define(Pdf::class, function (Faker $faker) {
    return [
        'pdf' =>  UploadedFile::fake()->create('document.pdf'),
        'edict_id' => factory(App\Edict::class),
    ];
});

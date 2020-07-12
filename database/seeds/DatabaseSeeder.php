<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\User::firstOrCreate([
            'email' => 'semec@gmail.com'
        ],[
            'name' => 'Administrador',
            'CPF' => '00000000000',
            'password' => '123456'
        ]);

        App\Servant::firstOrCreate([
            'email' => 'servant@gmail.com'
        ],[
            'name' => 'Servidor',
            'CPF' => '11111111111',
            'password' => '123456',
            'birthed_at' => now(),
            'natural_from' => Str::random(10),
            'marital_status' => Str::random(10),
            'mother_name' => Str::random(10),
            'father_name' => Str::random(10),
            'RG' => rand(),
            'PIS' => rand(),
            'CTPS' => rand(),
            'title' => Str::random(10),
            'address' => Str::random(10),
            'phone' => rand(),
        ]);
    }
}

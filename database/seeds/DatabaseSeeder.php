<?php

use Illuminate\Database\Seeder;

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
            'password' => Hash::make('123456')
        ]);
    }
}

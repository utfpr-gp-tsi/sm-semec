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
            'password' => '123456'
        ]);

        App\Servant::firstOrCreate([
            'email' => 'servant@gmail.com'
        ],[
            'name' => 'Servidor',
            'password' => '123456',
        ]);
    }
}

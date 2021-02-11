<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Workload;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate([
            'email' => 'semec@gmail.com'
        ],[
            'name' => 'Administrador',
            'CPF' => '00000000000',
            'password' => '123456'
        ]);

        Workload::firstOrCreate(['hours' => '20']);
        Workload::firstOrCreate(['hours' => '40']);
    }
}

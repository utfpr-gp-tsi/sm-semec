<?php

use Illuminate\Database\Seeder;
use App\Servers;

class ServerSeeder extends Seeder
{
	public function run()
    {
    	DB::table('servers')->truncade();

        $this->createAdmins();

        $this->createUsers(); 
    }

    private function createAdmins()
    {
        User::create([
            'email' => 'vinicius73@mycompany.com', 
            'name'  => 'Vinicius Reis',
            'password' => bcrypt('s&nh@')
        ]);

        $this->command->info('User vinicius73@mycompany.com created');

        User::create([
            'email' => 'another@mycompany.com', 
            'name'  => 'João Bobo',
            'password' => bcrypt('s&nh@')
        ]);
        
        $this->command->info('User another@mycompany.com created');
    }

    private function createUsers()
    {
        $max = rand(10, 30);

        for($i=0; $i < $max; $i++):
            $this->createUser($i);
        endfor;

        $this->command->info($max . ' demo users created');
    }

    private function createUser($index)
    {   
        return User::create([
            'server' => 'User '. $index,
            'registration' => 'User '. $index,
            'birth' => 'User '. $index,
            'natural from' => 'User '. $index,
            'marital status' => 'User '. $index,
            'mother name' => 'User '. $index,
            'father name' => 'User '. $index,
            'CPF' => 'User '. $index,
            'RG' => 'User '. $index,
            'PIS' => 'User '. $index,
            'CTPS' => 'User '. $index,
            'title' => 'User '. $index,
            'address' => 'User '. $index,
            'phone' => 'User '. $index,
            'email' => 'email' . $index . '@mail.com',
        ]);
    }
}

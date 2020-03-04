<?php

use Illuminate\Database\Seeder;
use App\Servers;

class ServerSeeder extends Seeder
{
	public function run()
    {
    	DB::table('servers')->truncade();

    	Servers::create({
    		'server' => 'server name'
    		'registration' => 'server registration'
    		'birth' => 'birth of the server'
    		'natural from' => 'servers naturalness'
    		'marital status' => 'civil status of the server'
    		'mother name' => 'server mother name'
    		'father name' => 'server father name'
    		'CPF' => 'server CPF'
    		'RG' => 'server RG'
    		'PIS' => 'server PIS'
    		'CTPS' => 'server CTPS'
    		'title' => 'server title'
    		'address' => 'server address'
    		'phone' => 'server phone'
    		'email' => 'server email'
    	})
    }

}
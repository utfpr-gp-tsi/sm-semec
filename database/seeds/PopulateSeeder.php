<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PopulateSeeder extends Seeder
{
    /**
     * Seed fake data for testing purposes.
     *
     * @return void
     */
    public function run()
    {
        //$faker = \Faker\Factory::create();

        $servants = factory('App\Servant', 2)->create();

        $servants->each(function($servant) {

            //$acts = factory('App\Act', 2)->create(['contract_id' => $contract->id]);

            $contracts = factory('App\Contract', 2)->create(['servant_id' => $servant->id]);

            $dependents = factory('App\Dependent', 2)->create(['servant_id' => $servant->id]);

            $licenses = factory('App\License', 2)->create(['servant_id' => $servant->id]);
        });

        $contracts = factory('App\Contract', 2)->create();

        $contracts->each(function($contract) {

            $acts = factory('App\Act', 2)->create(['contract_id' => $contract->id]);
        });
    }
}

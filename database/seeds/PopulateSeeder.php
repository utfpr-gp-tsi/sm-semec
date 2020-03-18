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
        DB::table('acts')->delete();
        DB::table('contracts')->delete();
        DB::table('dependents')->delete();
        DB::table('licenses')->delete();
        DB::table('servants')->delete();

        $servants = factory('App\Servant', 2)->create();

        $servants->each(function($servant) {
            /**
               * @var  string  $contracts
            */
            private $contracts;

            $contracts = factory('App\Contract')->create(['servant_id' => $servant->id]);
            /**
               * @var  string  $dependents
            */
            private $dependents;

            $dependents = factory('App\Dependent')->create(['servant_id' => $servant->id]);
            /**
               * @var  string  $licenses
            */
            private $licenses;

            $licenses = factory('App\License')->create(['servant_id' => $servant->id]);
        });

        $servants->each(function($contract) {
            /**
               * @var  string  $acts
            */
            private $acts;
            $acts = factory('App\Act')->create(['contract_id' => $contract->id]);
        });
    }
}
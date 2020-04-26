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

        $servants = factory('App\Servant', 30)->create();

        $servants->each(function($servant) {
            factory('App\Contract', 2)->create(['servant_id' => $servant->id]);
            factory('App\Dependent', 2)->create(['servant_id' => $servant->id]);
            factory('App\License', 2)->create(['servant_id' => $servant->id]);
        });

        $servants->each(function($contract) {
            factory('App\Act', 2)->create(['contract_id' => $contract->id]);
        });
    }
}

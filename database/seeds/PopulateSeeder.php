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

        $servants = factory('App\Servant', 1)->create();

        $servants->each(function($servant) {

            factory('App\Contract')->create(['servant_id' => $servant->id]);

            factory('App\Dependent')->create(['servant_id' => $servant->id]);

            factory('App\License')->create(['servant_id' => $servant->id]);
        });

        $servants->each(function($contract) {
            
            factory('App\Act')->create(['contract_id' => $contract->id]);
        });
    }
}

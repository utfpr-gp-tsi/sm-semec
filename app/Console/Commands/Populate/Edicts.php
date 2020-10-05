<?php

namespace App\Console\Commands\Populate;

use Illuminate\Console\Command;
use DB;
use App\Edict;

class Edicts extends Command
{
   /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'populate:edicts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate edicts';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if (\App::environment('production')) {
            $this->info('This task can not be run in production because it will erase de database');
            return;
        }

        $this->info('Populate edicts');
        DB::table('edicts')->delete();

        $current_year = now()->year;

        for ($i = 0; $i < 5; $i++) {
            $year = $current_year - $i;
            $started_at = "01/10/{$year} 00:00";
            $ended_at = "01/11/{$year} 23:59";

            factory('App\Edict', rand(5, 10))
                ->create(['started_at' => $started_at, 'ended_at' => $ended_at])
                ->each(function ($edict) {
                    $edict->pdfs()->save(factory('App\Pdf')->make());
                    $edict->pdfs()->save(factory('App\Pdf')->make());
                });
        }
    }
}

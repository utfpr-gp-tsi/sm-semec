<?php

namespace App\Console\Commands\Populate;

use Illuminate\Console\Command;
use DB;
use App\Models\ServantCompletaryData;
use App\Models\Movement;

class ServantCompletaryDatas extends Command
{
   /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'populate:servant_completary_datas';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate servant_completary_datas';

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

        $this->info('Populate servant_completary_datas');
        DB::table('servant_completary_datas')->delete();

        for ($i = 0; $i < 3; $i++) {
            ServantCompletaryData::factory()
                ->create()
                ->each(function ($completaryData) {
                    $completaryData->moviments()->save(Movement::factory()->make());
                    $completaryData->moviments()->save(Movement::factory()->make());
                });
        }
    }
}

<?php

namespace App\Console\Commands\Populate;

use Illuminate\Console\Command;
use DB;
use App\Models\Edict;
use App\Models\Servant;
use App\Models\Contract;
use App\Models\Unit;
use App\Models\Inscription;
use App\Models\InscriptionUnit;
use App\Models\RemovalType;

class Inscriptions extends Command
{
   /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'populate:inscriptions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate inscriptions';

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
     * @SuppressWarnings("unused")
     * @return mixed
     */
    public function handle()
    {
        if (\App::environment('production')) {
            $this->info('This task can not be run in production because it will erase de database');
            return;
        }

        $this->info('Populate inscriptions');
        DB::table('inscriptions')->delete();

        $edicts = Edict::all();

        $edicts->each(function ($edict) {
            $inscriptions = Inscription::factory()->count(2)->create(['edict_id' => $edict->id]);
            $inscriptions->each(function ($inscription) {
                Unit::inRandomOrder()->limit(rand(1, 3))->get()->each(function ($unit) use ($inscription) {
                    InscriptionUnit::create(['inscription_id' => $inscription->id, 'unit_id' => $unit->id]);
                });
            });
        });
    }
}

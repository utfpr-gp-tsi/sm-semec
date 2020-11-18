<?php

namespace App\Console\Commands\Populate;

use Illuminate\Console\Command;
use DB;
use App\Models\Workload;

class Workloads extends Command
{
   /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'populate:workloads
                            {--json} populate from a json file locate at database/data/workload.json
                            {--clear} erase roles and relationships';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate Workloads';

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
        if ($this->option('clear')) {
            DB::table('workloads')->delete();
        }

        if ($this->option('json')) {
            $this->populateFromJSON();
            return;
        }

        $this->populateFromFaker();
    }

    private function populateFromFaker(): void
    {
        if (\App::environment('production')) {
            $this->info('This task can not be run in production because it will erase de database');
            return;
        }

        $this->info('Populate Workloads');
        DB::table('workloads')->delete();

        //$categories = Workload::factory()->count(4)->create();
    }

    private function populateFromJSON(): void
    {
        $this->info('Populate Workloads from ./database/data/workload.json');
        $jsonPath = base_path('./database/data/workload.json');
        $jsonString = file_get_contents($jsonPath);

        if ($jsonString === false) {
            $this->info('File workload.json not found');
            $this->info('You need to create workload.json file in database/data folder');
            return;
        }

        $jsonDecoded = json_decode($jsonString);

        $workloads = $jsonDecoded->workloads;

        foreach ($workloads as $data) {
            $workloads = $this->createOrUpdateWorkload($data);
        }
    }

            /**
     * Create or update Workload
     *
     * @param  object $data
     */
    public function createOrUpdateWorkload($data): Workload
    {
        return Workload::updateOrCreate(
            [
                'workload' => $data->workload,
            ]
        );
    }
}

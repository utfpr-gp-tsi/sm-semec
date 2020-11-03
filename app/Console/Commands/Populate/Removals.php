<?php

namespace App\Console\Commands\Populate;

use Illuminate\Console\Command;
use DB;
use App\Models\Removal;

class Removals extends Command
{
   /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'populate:removals
                            {--json} populate from a json file locate at database/data/removal.json
                            {--clear} erase removals and relationships';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate Removals';

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
            DB::table('removals')->delete();
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

        $this->info('Populate Removals');
        DB::table('removals')->delete();

        $removals = Removal::factory()->count(3)->create();
    }

    private function populateFromJSON(): void
    {
        $this->info('Populate Removals from ./database/data/removal.json');
        $jsonPath = base_path('./database/data/removal.json');
        $jsonString = file_get_contents($jsonPath);

        if ($jsonString === false) {
            $this->info('File removals.json not found');
            $this->info('You need to create removal.json file in database/data folder');
            return;
        }

        $jsonDecoded = json_decode($jsonString);
        $removals = $jsonDecoded->removals;

        foreach ($removals as $data) {
            $removals = $this->createOrUpdateRemoval($data);
        }
    }

            /**
     * Create or update Removal
     *
     * @param  object $data
     */
    public function createOrUpdateRemoval($data): Removal
    {
        return Removal::updateOrCreate(
            [
                'removal' => $data->removal,
            ]
        );
    }
}

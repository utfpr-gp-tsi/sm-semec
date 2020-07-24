<?php

namespace App\Console\Commands\Populate;

use Illuminate\Console\Command;
use DB;
use App\UnitCategory;
use App\Unit;

class Units extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'populate:units
                            {--json} populate from a json file locate at database/data/units.json
                            {--clear} erase units and relationships';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate units';

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
            DB::table('units')->delete();
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

        $unitscategory = factory('App\UnitCategory', 3)->create();

        $unitscategory->each(function ($unitscategory) {

            factory('App\Unit', 2)->create(['category_id' => $unitscategory->id]);
        });
    }

    private function populateFromJSON(): void
    {
        $jsonPath = base_path('./database/data/units.json');
        $jsonString = file_get_contents($jsonPath);

        if ($jsonString === false) {
            $this->info('File units.json not found');
            $this->info('You need to create units.json file in database/data folder');
            return;
        }

        $unitsCategory = json_decode($jsonString);

        foreach ($unitsCategory->units_categories as $category) {
             $this->info($category->name);

            foreach ($category->units as $unit) {
                $this->info($unit->name);
            }
        }
    }

        /**
     * Create or update UnitCategory
     *
     * @param  string $name
     * @param  object $data
     */
    public function createOrUpdateUnitCategory($name, $data): UnitCategory
    {
        return UnitCategory::updateOrCreate(
            [
                'name' => $name
            ],
            [
                'id' => $data->id,
            ]
        );
    }
        /**
     * Create or update Unit
     *
     * @param  UnitCategory $unitcategory
     * @param  Unit $unit
     */
    public function createOrUpdateUnit($unitcategory, $unit): Unit
    {
        return Unit::updateOrCreate(
            [
                'unitcategory_id' => $unitcategory->id,
                'name' => $unit->name,
            ],
            [
                'address' => $unit->address,
            ]
        );
    }
}

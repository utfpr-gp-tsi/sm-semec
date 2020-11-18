<?php

namespace App\Console\Commands\Populate;

use Illuminate\Console\Command;
use DB;
use App\Models\Role;

class Roles extends Command
{
   /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'populate:roles
                            {--json} populate from a json file locate at database/data/role.json
                            {--clear} erase roles and relationships';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate Roles';

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
            DB::table('roles')->delete();
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

        $this->info('Populate Roles');
        DB::table('roles')->delete();

        //$categories = Role::factory()->count(4)->create();
    }

    private function populateFromJSON(): void
    {
        $this->info('Populate Roles from ./database/data/role.json');
        $jsonPath = base_path('./database/data/role.json');
        $jsonString = file_get_contents($jsonPath);

        if ($jsonString === false) {
            $this->info('File role.json not found');
            $this->info('You need to create role.json file in database/data folder');
            return;
        }

        $jsonDecoded = json_decode($jsonString);
        $roles = $jsonDecoded->roles;

        foreach ($roles as $data) {
            $roles = $this->createOrUpdateRole($data);
        }
    }

            /**
     * Create or update Role
     *
     * @param  object $data
     */
    public function createOrUpdateRole($data): Role
    {
        return Role::updateOrCreate(
            [
                'name' => $data->name,
            ]
        );
    }
}
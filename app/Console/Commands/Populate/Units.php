<?php

namespace App\Console\Commands\Populate;

use Illuminate\Console\Command;
use DB;
use App\Unit;
use App\UnitCategory;

class Units extends Command
{
   /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'populate:units';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate Units';

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

        $this->info('Populate Units');
        DB::table('units_category')->delete();
        $categories = factory('App\UnitCategory', 4)->create();

        $categories->each(function ($category) {
            DB::table('units')->delete();
            $unit = factory('App\Unit', 22)->create(['category_id' => $category->id]);
           });
    }

}

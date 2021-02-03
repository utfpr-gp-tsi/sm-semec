<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Workload;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class WorkloadTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Workload::insert([
        ['hours' => '20'],
        ['hours' => '40'],
      ]);

    }
  }

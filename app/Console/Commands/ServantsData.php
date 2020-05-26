<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
// use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Seeder;
use DB;
use App\Servant;
use App\Contract;

class ServantsData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'populate:servants';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populate or upload servants';

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
        $jsonPath = base_path('./database/data/servants.json');

        if (!file_exists($jsonPath)) {
            $this->info('File servants.json not found');
            $this->info('You need to create servants.json file in database/data folder');
            return;
        }

        $jsonString = file_get_contents($jsonPath);
        $servants = json_decode($jsonString);

        foreach ($servants as $cpf => $data) {
            $servant = Servant::updateOrCreate(
                [
                    'CPF' => $cpf
                ],
                [
                    'name' => $data->name,
                    'birthed_at' => date('Y-m-d H:i:s', strtotime($data->birthed_at)),
                    'natural_from' => $data->natural_from,
                    'marital_status' => $data->marital_status,
                    'mother_name' => $data->mother_name,
                    'father_name' => $data->father_name,
                    'RG' => $data->RG,
                    'PIS' => $data->PIS,
                    'CTPS' => $data->CTPS,
                    'title' => $data->title,
                    'address' => $data->address,
                    'phone' => $data->phone,
                    'email' => $data->email,
                ]
            );


            foreach ($data->contracts as $contract) {
                Contract::updateOrCreate(
                    [
                        'servant_id' => $servant->id,
                        'registration' => $contract->registration,
                    ],
                    [
                        'admission_at' => date('Y-m-d H:i:s', strtotime($contract->admission_at)),
                        'termination_at' => date('Y-m-d H:i:s', strtotime($contract->termination_at)),
                        'secretary' => $contract->secretary,
                        'place' => $contract->place,
                        'role' => $contract->role,
                        'link' => $contract->link,
                    ]
                );
            }
        }
    }
}

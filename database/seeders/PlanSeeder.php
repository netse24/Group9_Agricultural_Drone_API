<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $plans = [
            [
                'type_job' => 'Spray',
                'date_time' => '2023-05-26',
                'area' => 'PV((11.9924000,105.4645030 11.9924006,105.4645057 11.9924102,105.4645254))',
                'user_id' => 1
            ],
            [
                'type_job' => 'Mapping',
                'date_time' => '2023-05-26',
                'area' => 'BMC((11.9924000,105.4645030 11.9924006,105.4645057 11.9924102,105.4645254))',
                'user_id' => 2
            ],
        ];
        Plan::insert($plans);
    }
}

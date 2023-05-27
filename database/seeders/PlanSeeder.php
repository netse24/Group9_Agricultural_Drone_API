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
                'name' => 'Order66',
                'date_time' => '2023-05-26 8:00',
                'area' => 'PV((11.9924000,105.4645030 11.9924006,105.4645057 11.9924102,105.4645254))',
                'user_id' => 1
            ],
            [
                'name' => 'Order67',
                'date_time' => '2023-05-26 7:00',
                'area' => 'BMC((11.9924000,105.4645030 11.9924006,105.4645057 11.9924102,105.4645254))',
                'user_id' => 2
            ],
        ];
        Plan::insert($plans);
    }
}

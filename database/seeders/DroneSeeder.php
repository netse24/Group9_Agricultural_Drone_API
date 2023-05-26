<?php

namespace Database\Seeders;

use App\Models\Drone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DroneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $drones = [
            [
                'drone_name' => 'D1',
                'battery' => '30%',
                'payload' => 'Spray',
                'user_id' => 1,
                'location_id' => 1
            ],
            [
                'drone_name' => 'D2',
                'battery' => '40%',
                'payload' => 'Mapping',
                'user_id' => 1,
                'location_id' => 1
            ],
        ];
        Drone::insert($drones);
    }
}

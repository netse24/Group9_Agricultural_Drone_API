<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $location = [
            [
                'latitude' => '21.22',
                'longitude' => '21.22'
            ],
            [
                'latitude' => '22.22',
                'longitude' => '22.22'
            ],
            [
                'latitude' => '23.22',
                'longitude' => '23.22'
            ],
            [
                'latitude' => '24.22',
                'longitude' => '24.22'
            ],
            [
                'latitude' => '25.22',
                'longitude' => '25.22'
            ],
        ];
        Location::insert($location);
    }
}

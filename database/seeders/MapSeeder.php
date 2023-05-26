<?php

namespace Database\Seeders;

use App\Models\Map;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $maps = [
            [
                'image' => 'net_image.png',
                'province_id' =>  1,
                'drone_id' => 1,
                'farm_id' => 1,
            ],
            [
                'image' => 'net_my_image.png',
                'province_id' =>  1,
                'drone_id' => 2,
                'farm_id' => 2,
            ],
            [
                'image' => 'nit_image.png',
                'province_id' =>  2,
                'drone_id' => 2,
                'farm_id' => 2,
            ],
            [
                'image' => 'nit_nit_image.png',
                'province_id' =>  2,
                'drone_id' => 2,
                'farm_id' => 2,
            ],
        ];
        Map::insert($maps);
    }
}

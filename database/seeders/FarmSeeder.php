<?php

namespace Database\Seeders;

use App\Models\Farm;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FarmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $farms = [
            [
                'name' => 'Net PV',
                'user_id' => 1,
                'province_id' => 1
            ],
            [
                'name' => 'Phannit PV',
                'user_id' => 2,
                'province_id' => 2
            ],
        ];
        Farm::insert($farms);
    }
}

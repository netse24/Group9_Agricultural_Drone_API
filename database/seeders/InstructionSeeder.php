<?php

namespace Database\Seeders;

use App\Models\Instruction;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstructionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $instructions = [
            [
                'instruction' => 'Turn off',
                'drone_id' => 1,
                'plan_id' => 1
            ],
            [
                'instruction' => 'Turn On',
                'drone_id' => 1,
                'plan_id' => 1
            ],
            [
                'instruction' => 'Turn On',
                'drone_id' => 2,
                'plan_id' => 2
            ],
            [
                'instruction' => 'Charge',
                'drone_id' => 1,
                'plan_id' => 1
            ],
            [
                'instruction' => 'Take photo',
                'drone_id' => 1,
                'plan_id' => 1
            ],
        ];
        Instruction::insert($instructions);
    }
}

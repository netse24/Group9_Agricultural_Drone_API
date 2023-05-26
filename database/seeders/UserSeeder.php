<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'NETSE',
                'email' => "net@gmail.com",
                'password' => bcrypt('123456')
            ],
            [
                'name' => 'Phannit',
                'email' => "nit@gmail.com",
                'password' => bcrypt('123456')
            ],
        ];
        User::insert($users);
    }
}

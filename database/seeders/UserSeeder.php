<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'admin',
                'email' => 'admin@rpl.edu',
                'password' => bcrypt('admin'),
                'role' => 'admin',
            ],
            [
                'username' => 'rafi',
                'email' => 'rafiislamipasha27@gmail.com',
                'password' => bcrypt('rafi'),
                'role' => 'user',
            ],
            [
                'username' => 'rafiislami27',
                'email' => 'rafi.ipdhp.qa@gmail.com',
                'password' => bcrypt('RafiIslami27'),
                'role' => 'psikolog',
            ],
        ];

        foreach($users as $key => $value) {
            User::create($value);
        }
    }
}

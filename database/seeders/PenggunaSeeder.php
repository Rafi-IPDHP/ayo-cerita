<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenggunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $penggunas = [
            [
                'nama' => 'rafi',
                'umur' => 18,
                'user_id' => 2,
            ],
        ];

        foreach($penggunas as $key => $value) {
            Pengguna::create($value);
        }
    }
}

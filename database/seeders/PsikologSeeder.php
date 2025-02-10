<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Psikolog;

class PsikologSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $psikologs = [
            [
                'nama' => 'Rafi Islami Pasha',
                'jenis_kelamin' => 'laki-laki',
                'no_hp' => '082123947660',
                'spesialisasi' => 'remaja',
                'str_doc' => 'Ayo-Cerita!.pdf',
                'sip_doc' => 'Ayo-Cerita!.pdf',
                'institusi_pendidikan' => 'Universitas Pendidikan Indonesia',
                'photo' => 'Dazai_Osamu.jpeg',
                'user_id' => 3,
            ],
        ];

        foreach($psikologs as $key => $value) {
            Psikolog::create($value);
        }
    }
}

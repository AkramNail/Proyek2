<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ukmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ukm')->insert([
            [
                'id_Ukm' => 1,
                'nama_Ukm' => 'SEBURA',
                'deskripsi_Ukm' => 'Unit Kegiatan Mahasiswa yang bergerak di bidang seni',
                'logo_Ukm' => 'sebura.png',
            ],
            [
                'id_Ukm' => 2,
                'nama_Ukm' => 'ROBOTIKA',
                'deskripsi_Ukm' => 'Unit Kegiatan Mahasiswa yang bergerak di bidang IOT',
                'logo_Ukm' => 'robotika.png',
            ],
            [
                'id_Ukm' => 3,
                'nama_Ukm' => 'POPI',
                'deskripsi_Ukm' => 'Unit Kegiatan Mahasiswa yang bergerak di bidang olahraga',
                'logo_Ukm' => 'popi.png',
            ]
        ]);
    }
}

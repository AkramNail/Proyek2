<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class anggotaUkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('anggota_ukm')->insert([
            
            
            [
                'id_anggota_ukm' => 1,
                'id_anggota' => 1,
                'id_Ukm' => 1,
                'id_divisi' => 1,
            ],
            [
                'id_anggota_ukm' => 2,
                'id_anggota' => 2,
                'id_Ukm' => 2,
                'id_divisi' => 2,
            ],

        ]);
    }
}

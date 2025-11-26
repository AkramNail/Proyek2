<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class anggotaKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('anggota_kegiatan')->insert([
            [
                'id_anggotaKegiatan' => 1,
                'id_Kegiatan' => 1,
                'id_Ukm' => 1,
                'id_Anggota' => 2,
            ]
        ]);
    }
}

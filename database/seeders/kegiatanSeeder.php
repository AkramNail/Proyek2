<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class kegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kegiatan')->insert([
            [
                'id_kegiatan' => 1,
                'id_Ukm' => 1,
                'nama_kegiatan' => 'Latihan dance',
                'deskripsi' => 'Latihan dance mingguan untuk anggota UKM SEBURA.',
                'jadwal_keigiatan' => '2023-11-01',
                'foto_kegiatan' => 'kegiatan_102.jpg',
            ],
            [
                'id_kegiatan' => 2,
                'id_Ukm' => 1,
                'nama_kegiatan' => 'latihan band',
                'deskripsi' => 'Latihan band mingguan untuk anggota UKM SEBURA.',
                'jadwal_keigiatan' => '2023-11-15',
                'foto_kegiatan' => 'kegiatan_101.jpg',
            ],
        ]);
    }
}

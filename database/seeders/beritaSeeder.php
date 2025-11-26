<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class beritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('berita')->insert([
            [
                'id_Berita' => 1,
                'judul_berita' => 'Berita Pertama',
                'isi_berita' => 'Ini adalah isi dari berita pertama.',
                'created_at' => '2024-10-01',
                'foto_berita' => 'berita1.jpeg',
                'id_UKM' => 1,
            ],
            [
                'id_Berita' => 2,
                'judul_berita' => 'Berita Kedua',
                'isi_berita' => 'Ini adalah demo berita kedua',
                'created_at' => '2025-11-01',
                'foto_berita' => 'berita2.jpeg',
                'id_UKM' => 3,
            ],
        ]);

    }
}

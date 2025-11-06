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
                'tanggal_berita' => '2024-10-01',
                'foto_berita' => 'foto_berita_pertama.jpg',
            ],
        ]);

    }
}

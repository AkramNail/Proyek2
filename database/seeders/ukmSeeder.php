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
                'deskripsi_Ukm' => <<<TEXT
                UKM Seni Budaya POLINDRA adalah unit kegiatan mahasiswa yang mewadahi minat dan bakat dalam bidang seni. UKM ini memiliki tiga divisi utama, yaitu Musik, Paduan Suara, dan Tari.

                Divisi Musik fokus pada pengembangan kemampuan bermain alat musik dan penampilan band.

                Divisi Paduan Suara mengembangkan kemampuan vokal harmoni untuk tampil di acara formal kampus.

                Divisi Tari terbagi menjadi Tari Tradisional dan Tari Modern, yang masing-masing berperan dalam melestarikan budaya serta menampilkan koreografi kreatif sesuai perkembangan seni masa kini.
                TEXT,
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
                'deskripsi_Ukm' => <<<TEXT
                UKM POPI (Persatuan Olahraga Politeknik Negeri Indramayu) adalah unit kegiatan mahasiswa yang menaungi berbagai cabang olahraga di POLINDRA. UKM ini berfungsi sebagai wadah bagi mahasiswa yang memiliki minat di bidang olahraga, baik untuk pengembangan kemampuan, latihan rutin, maupun persiapan mengikuti kompetisi.

                Melalui berbagai divisinya, POPI mendukung pembinaan atlet kampus, meningkatkan kesehatan dan sportivitas mahasiswa, serta menjadi representasi POLINDRA dalam event olahraga tingkat regional maupun nasional.
                TEXT,
                'logo_Ukm' => 'popi.png',
            ]
        ]);
    }
}

<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class divisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('divisi')->insert([
            [
                'id_divisi' => 1,
                'nama_divisi' => 'Divisi Msuic',
                'deskripsi_divisi' => 'Divisi yang menangani segala hal yang berhubungan dengan musik dalam UKM tersebut.',
                'id_Ukm' => 1,
            ],
            [
                'id_divisi' => 2,
                'nama_divisi' => 'Divisi Dance',
                'deskripsi_divisi' => 'Divisi yang bertanggung jawab atas segala aktivitas yang berhubungan dengan tarian dalam UKM tersebut.',
                'id_Ukm' => 1,
            ]
        ]);
    }
}

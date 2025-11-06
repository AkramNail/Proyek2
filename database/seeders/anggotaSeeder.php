<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class anggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('anggota')->insert([
            [
                'id_anggota' => 1,
                'nama' => 'Asep Udin',
                'email' => 'UdinAsep10@gmail.com',
                'Password' => bcrypt('password123'),
            ],
            [
                'id_anggota' => 2,
                'nama' => 'Yanto XD',
                'email' => '128Gas@gmail.com',
                'Password' => bcrypt('password123'),
            ],
            [
                'id_anggota' => 3,
                'nama' => 'Udin Pertama',
                'email' => 'AkunPertama@gmail.com',
                'Password' => bcrypt('password123'),
            ],
        ]);
    }
}

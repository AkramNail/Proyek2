<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class pengurusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pengurus')->insert([
            
            ['id_pengurus' => 1,
            'nama' => 'Asep bensin',
            'email' => 'Asep@gmail.com',
            'password' => 'password123',
            'id_Ukm' => 1]
        ]);
    }
}

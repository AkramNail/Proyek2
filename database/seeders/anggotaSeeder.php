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
                'nim' => 204031,
                'nama' => 'Lucille',
                'email' => 'bododah123@gmail.com',
                'Password' => 'password123',
                'role' => 'anggota',
                'ukm' => 0
            ],
            [
                'nim' => 204033,
                'nama' => 'Akun admin',
                'email' => 'akunkorban1099@gmail.com',
                'Password' => 'password123',
                'role' => 'admin',
                'ukm' => 0
            ],
            [
                'nim' => 204032,
                'nama' => 'Akun pengurus',
                'email' => 'udinakram1000@gmail.com',
                'Password' => 'password123',
                'role' => 'pengurus',
                'ukm' => 1
            ],
        ]);
    }
}

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
                'ukm' => 0,
                'email_verified_at' => now()
            ],
            [
                'nim' => 204033,
                'nama' => 'Akun super admin',
                'email' => 'akunkorban1099@gmail.com',
                'Password' => 'password123',
                'role' => 'super admin',
                'ukm' => 0,
                'email_verified_at' => now()
            ],
            [
                'nim' => 204033,
                'nama' => 'Akun admin',
                'email' => 'email1003@gmail.com',
                'Password' => 'password123',
                'role' => 'admin',
                'ukm' => 0,
                'email_verified_at' => now(),
            ],
            [
                'nim' => 204032,
                'nama' => 'Akun pengurus',
                'email' => 'udinakram1000@gmail.com',
                'Password' => 'password123',
                'role' => 'pengurus',
                'ukm' => 1,
                'email_verified_at' => now(),
            ],
            [
                'nim' => 2040991,
                'nama' => 'Akun pembina',
                'email' => 'email1001@gmail.com',
                'Password' => 'password123',
                'role' => 'pembina',
                'ukm' => 1,
                'email_verified_at' => now(),
            ],
            [
                'nim' => 2040991,
                'nama' => 'Akun pengurus utama',
                'email' => 'email1002@gmail.com',
                'Password' => 'password123',
                'role' => 'pengurus utama',
                'ukm' => 1,
                'email_verified_at' => now(),
            ],
        ]);
    }
}

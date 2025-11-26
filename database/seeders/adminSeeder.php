<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin')->insert([
            [
                'id_admin' => 1,
                'nama' => 'Admin Utama',
                'email' => 'SuperAdmin@gmail.com',
                'password' => 'admin123',
            ],
        ]);
    }
}

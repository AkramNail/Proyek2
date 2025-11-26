<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(anggotaSeeder::class);
        $this->call(beritaSeeder::class);
        $this->call(ukmSeeder::class);
        $this->call(divisiSeeder::class);
        $this->call(pengurusSeeder::class);
        $this->call(kegiatanSeeder::class);
        $this->call(anggotaUkmSeeder::class);
        $this->call(adminSeeder::class);
        $this->call(anggotaKegiatanSeeder::class);
    }
}

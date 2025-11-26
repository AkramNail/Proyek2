<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kegiatan', function (Blueprint $table) {
            $table->integer('id_kegiatan')->primary();
            $table->integer('id_Ukm');
            $table->string('nama_kegiatan', 200);
            $table->string('deskripsi', 250);
            $table->date('jadwal_keigiatan');
            $table->string('foto_kegiatan', 255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kegiatan');
    }
};

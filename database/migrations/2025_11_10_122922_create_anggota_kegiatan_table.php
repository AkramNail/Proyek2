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
        Schema::create('anggota_kegiatan', function (Blueprint $table) {
            $table->increments('id_anggotaKegiatan');
            $table->integer('id_Kegiatan');
            $table->integer('id_Ukm');
            $table->integer('id_Anggota');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_kegiatan');
    }
};

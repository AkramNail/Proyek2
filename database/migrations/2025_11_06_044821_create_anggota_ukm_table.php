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
        Schema::create('anggota_ukm', function (Blueprint $table) {
            $table->integer('nomer')->primary();
            $table->string('id_anggota', 100);
            $table->string('id_Ukm', 100);
            $table->string('nama', 100);
            $table->string('email', 100);
            $table->string('Password', 255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggota_ukm');
    }
};

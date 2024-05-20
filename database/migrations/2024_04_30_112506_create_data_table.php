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
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->string('niup')->unique();
            $table->string('nama_santri');
            $table->string('wilayah');
            $table->string('daerah');
            $table->string('lembaga');
            $table->string('nilai_t');
            $table->string('nilai_f');
            $table->string('nilai_h');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
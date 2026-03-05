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
        Schema::create('mobils', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mobil');
            $table->string('tipe_mobil'); // misal ELF, Hiace, Avanza, dll
            $table->integer('kapasitas'); // jumlah penumpang
            $table->string('transmisi'); // manual / matic
            $table->text('deskripsi')->nullable();
            $table->string('gambar')->nullable(); // path gambar mobil
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobils');
    }
};

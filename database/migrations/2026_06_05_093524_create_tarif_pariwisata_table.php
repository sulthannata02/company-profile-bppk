<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tarif_pariwisata', function (Blueprint $table) {
            $table->id();

            $table->foreignId('mobil_id')
                ->constrained('mobils')
                ->cascadeOnDelete();

            $table->decimal('tarif_per_km', 15, 2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tarif_pariwisata');
    }
};
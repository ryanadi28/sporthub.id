<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gor_id')->constrained('gors')->cascadeOnDelete();
            $table->string('nama');
            $table->string('tipe')->nullable(); // contoh: futsal, badminton, basket
            $table->decimal('harga_per_jam', 12, 2)->default(0);
            $table->boolean('is_hidden')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fields');
    }
};

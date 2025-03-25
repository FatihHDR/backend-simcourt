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
        Schema::create('persetujuan_pihaks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pihak_id')->constrained('pihaks')->onDelete('cascade');
            $table->enum('persetujuan', ['setuju', 'tidak_setuju', 'belum_membuat'])->default('belum_membuat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persetujuan_pihaks');
    }
};
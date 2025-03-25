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
        Schema::create('pendaftaran_sidangs', function (Blueprint $table) {
            $table->id();
            $table->string("nama_pengadilan");
            $table->foreignId('mahasiswa_id')->constrained('mahasiswas')->onDelete('cascade')->after('pembiayaan_id');
            $table->foreignId('pembiayaan_id')->constrained('pembiayaan_perkaras')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_sidangs');
    }
};

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
        Schema::create('dokumen_permohonans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pendaftaran_permohonan_id')->constrained('pendaftaran_permohonans')->onDelete('cascade');
            $table->string('nama_dokumen');
            $table->string('diupload_oleh');
            $table->string('peran');
            $table->string('file_path')->nullable();
            $table->enum('status', ['Belum terverifikasi', 'Terverifikasi'])->default('Belum terverifikasi');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_permohonans');
    }
};
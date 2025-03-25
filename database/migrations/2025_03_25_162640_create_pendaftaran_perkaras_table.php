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
        Schema::create('pendaftaran_perkaras', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('alamat_kantor')->nullable();
            $table->string('no_handphone', 20); // Increase length to 20
            $table->string('telp_kantor', 20)->nullable(); // Increase length to 20
            $table->string('no_induk')->unique();
            $table->string('organisasi');
            $table->date('tanggal_mulai_berlaku');
            $table->date('tanggal_habis_berlaku');
            $table->date('tanggal_penyumpahan')->nullable();
            $table->string('tempat_penyumpahan')->nullable();
            $table->string('no_ba_sumpah')->nullable();
            $table->string('no_ktp')->unique();
            $table->string('bank');
            $table->string('no_rekening');
            $table->string('nama_akun_bank');
            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
            $table->foreignId('mahasiswa_id')->constrained('mahasiswas')->onDelete('cascade');
            $table->foreignId('pendaftaran_sidang_id')->constrained('pendaftaran_sidangs')->onDelete('cascade');
            $table->string('file_dokumen_kta')->nullable();
            $table->string('file_dokumen_penyumpahan')->nullable();
            $table->string('file_dokumen_ktp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_perkaras');
    }
};
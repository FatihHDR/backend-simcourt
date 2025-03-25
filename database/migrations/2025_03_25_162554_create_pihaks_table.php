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
        Schema::create('pihaks', function (Blueprint $table) {
            $table->id();
            $table->string("no_pendaftaran");
            $table->string("status_pihak");
            $table->string("email")->nullable();
            $table->string("nama_lengkap");
            $table->string("status_alamat");
            $table->string("alamat")->nullable();
            $table->string("telepon");
            $table->string("provinsi");
            $table->string("kecamatan");
            $table->string("kabupaten");
            $table->string("kelurahan");
            $table->foreignId('pendaftaran_sidang_id')->constrained('pendaftaran_sidangs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pihaks');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('panggilan_sidangs', function (Blueprint $table) {
            $table->id();
            $table->string('nomor');
            $table->date('tanggal_sidang');
            $table->time('jam_sidang');
            $table->foreignId('detail_pendaftaran_id')->constrained('detail_pendaftarans')->onDelete('cascade');
            $table->text('catatan_panggilan');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('panggilan_sidangs');
    }
};
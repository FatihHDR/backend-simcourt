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
        Schema::create('detail_pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('detail_pendaftaran_id')->constrained('detail_pendaftarans')->onDelete('cascade');
            $table->string('diterima_dari');
            $table->integer('panjar_perkara');
            $table->string('status_pembayaran')->default('sudah dibayar');
            $table->date('tanggal_pembayaran')->default(now());
            $table->time('jam_pembayaran')->default(now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pembayarans');
    }
};
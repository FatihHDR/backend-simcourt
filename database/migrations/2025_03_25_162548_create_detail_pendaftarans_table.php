<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_pendaftarans', function (Blueprint $table) {
            $table->id();
            $table->string("no_pendaftaran");
            $table->foreignId('pendaftaran_sidang_id')->constrained('pendaftaran_sidangs')->onDelete('cascade');
            $table->foreignId('kelas_id')->constrained('kelas')->onDelete('cascade');
            $table->foreignId('penggugat_id')->constrained('mahasiswas')->onDelete('cascade'); // Add this line
            $table->foreignId('dokumen_id')->constrained('dokumens')->onDelete('cascade'); // Add this line
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pendaftarans');
    }
};

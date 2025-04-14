<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('panggilan_sidangs', function (Blueprint $table) {
            $table->string('kategori')->default('panggilan');
            $table->date('tanggal_panggilan')->default(now()->toDateString());
            $table->foreignId('pihak_id')->nullable()->constrained('pihaks')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('panggilan_sidangs', function (Blueprint $table) {
            $table->dropColumn('kategori');
            $table->dropColumn('tanggal_panggilan');
            $table->dropForeign(['pihak_id']);
            $table->dropColumn('pihak_id');
        });
    }
};
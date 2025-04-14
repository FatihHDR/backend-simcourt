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
        Schema::table('pendaftaran_sidangs', function (Blueprint $table) {
            $table->foreignId('advokat_id')->nullable()->constrained('advokats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftaran_sidangs', function (Blueprint $table) {
            $table->dropForeign(['advokat_id']);
            $table->dropColumn('advokat_id');
        });
    }
};
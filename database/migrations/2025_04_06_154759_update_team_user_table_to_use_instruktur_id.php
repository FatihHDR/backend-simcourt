<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Step 1: Add the instruktur_id column as nullable
        Schema::table('team_user', function (Blueprint $table) {
            $table->foreignId('instruktur_id')->nullable()->constrained('instrukturs')->cascadeOnDelete();
        });

        // Step 2: Populate instruktur_id for existing rows
        DB::table('team_user')->update([
            'instruktur_id' => DB::table('instrukturs')->first()->id ?? null, // Assign a valid instruktur_id
        ]);

        // Step 3: Drop the user_id column
        Schema::table('team_user', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        // Step 4: Alter the instruktur_id column to make it NOT NULL
        Schema::table('team_user', function (Blueprint $table) {
            $table->foreignId('instruktur_id')->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('team_user', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->dropForeign(['instruktur_id']);
            $table->dropColumn('instruktur_id');
        });
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('instrukturs', function (Blueprint $table) {
            $table->boolean('is_admin')->default(false)->after('role'); // Tambahkan kolom is_admin
        });
    }

    public function down(): void
    {
        Schema::table('instrukturs', function (Blueprint $table) {
            $table->dropColumn('is_admin');
        });
    }
};
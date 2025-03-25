<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DokumenPermohonan;

class DokumenPermohonanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat 30 DokumenPermohonan secara acak
        DokumenPermohonan::factory()->count(30)->create();
    }
}
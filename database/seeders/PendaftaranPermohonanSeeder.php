<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PendaftaranPermohonan;
use App\Models\DokumenPermohonan;

class PendaftaranPermohonanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat 10 PendaftaranPermohonan dengan masing-masing memiliki 3 DokumenPermohonan
        PendaftaranPermohonan::factory()
            ->count(10)
            ->has(DokumenPermohonan::factory()->count(3), 'dokumen')
            ->create();
    }
}
<?php

namespace Database\Seeders;

use App\Models\PersetujuanPihak;
use Illuminate\Database\Seeder;

class PersetujuanPihakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PersetujuanPihak::factory()->count(10)->create();
    }
}
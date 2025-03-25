<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetailPembayaran;

class DetailPembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DetailPembayaran::factory()->count(20)->create();
    }
}
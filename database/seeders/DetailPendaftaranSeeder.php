<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetailPendaftaran;

class DetailPendaftaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DetailPendaftaran::factory()->count(10)->create();
    }
}
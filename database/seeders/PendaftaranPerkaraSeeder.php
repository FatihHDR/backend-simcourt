<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PendaftaranPerkara;

class PendaftaranPerkaraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PendaftaranPerkara::factory()->count(10)->create();
    }
}
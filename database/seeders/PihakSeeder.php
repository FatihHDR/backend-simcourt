<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pihak;

class PihakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pihak::factory()->count(20)->create();
    }
}
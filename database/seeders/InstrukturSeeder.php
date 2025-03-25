<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instruktur;

class InstrukturSeeder extends Seeder
{
    public function run()
    {
        Instruktur::factory()->count(5)->create();
    }
}

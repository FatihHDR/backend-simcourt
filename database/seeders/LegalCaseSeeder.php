<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LegalCase;

class LegalCaseSeeder extends Seeder
{
    public function run()
    {
        LegalCase::factory()->count(10)->create();
    }
}
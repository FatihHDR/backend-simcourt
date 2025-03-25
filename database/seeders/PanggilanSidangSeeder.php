<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PanggilanSidang;

class PanggilanSidangSeeder extends Seeder
{
    public function run()
    {
        PanggilanSidang::factory()->count(10)->create();
    }
}
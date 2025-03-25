<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dokumen;

class DokumenSeeder extends Seeder
{
    public function run()
    {
        Dokumen::factory(10)->create();
    }
}
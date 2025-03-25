<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\JenisFile;
class JenisFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        JenisFile::factory()->count(5)->create();
    }
}

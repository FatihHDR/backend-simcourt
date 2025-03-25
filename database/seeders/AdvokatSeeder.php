<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Advokat;

class AdvokatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Advokat::factory()->count(10)->create();
    }
}
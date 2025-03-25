<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    public function run()
    {
        Mahasiswa::factory()->count(100)->create([
            'status' => 'anggota', // Set default status
        ]);
    }
}

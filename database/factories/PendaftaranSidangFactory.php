<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PendaftaranSidang;
use App\Models\PembiayaanPerkara;
use App\Models\Mahasiswa;

class PendaftaranSidangFactory extends Factory
{
    protected $model = PendaftaranSidang::class;

    public function definition(): array
    {
        return [
            'mahasiswa_id' => Mahasiswa::factory(),
            'pembiayaan_id' => PembiayaanPerkara::factory(),
            'nama_pengadilan' => $this->faker->city,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
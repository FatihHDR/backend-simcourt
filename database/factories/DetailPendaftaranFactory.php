<?php

namespace Database\Factories;

use App\Models\DetailPendaftaran;
use App\Models\Mahasiswa;
use App\Models\Dokumen;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetailPendaftaranFactory extends Factory
{
    protected $model = DetailPendaftaran::class;

    public function definition()
    {
        return [
            'no_pendaftaran' => $this->faker->unique()->numerify('PENDAFTARAN-#####'),
            'pendaftaran_sidang_id' => \App\Models\PendaftaranSidang::factory(),
            'kelas_id' => \App\Models\Kelas::factory(),
            'penggugat_id' => Mahasiswa::factory(), // Add this line
            'dokumen_id' => Dokumen::factory(), // Add this line
        ];
    }
}
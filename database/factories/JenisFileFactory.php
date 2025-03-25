<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\JenisFile;
use App\Models\PembiayaanPerkara;

class JenisFileFactory extends Factory
{
    protected $model = JenisFile::class;

    public function definition(): array
    {
        return [
            'pembiayaan_id' => PembiayaanPerkara::factory(),
            'nama_jenis_file' => $this->faker->randomElement([
                'KTP Pemohon',
                'Surat Pernyataan Tidak Mampu',
                'Surat Keterangan Tidak Mampu (SKTM)',
                'Surat Keterangan Tunjangan Sosial Lainnya'
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
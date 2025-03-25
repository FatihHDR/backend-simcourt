<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FilePersyaratan;
use App\Models\PendaftaranSidang;
use App\Models\JenisFile;

class FilePersyaratanFactory extends Factory
{
    protected $model = FilePersyaratan::class;

    public function definition(): array
    {
        return [
            'pendaftaran_sidang_id' => PendaftaranSidang::factory(),
            'jenisfile_id' => JenisFile::factory(),
            'nama_file' => $this->faker->word . '.' . $this->faker->fileExtension,
            'status' => $this->faker->randomElement(['accepted', 'decline']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
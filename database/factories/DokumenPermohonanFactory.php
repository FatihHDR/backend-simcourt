<?php

namespace Database\Factories;

use App\Models\DokumenPermohonan;
use App\Models\PendaftaranPermohonan;
use Illuminate\Database\Eloquent\Factories\Factory;

class DokumenPermohonanFactory extends Factory
{
    protected $model = DokumenPermohonan::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pendaftaran_permohonan_id' => PendaftaranPermohonan::factory(),
            'nama_dokumen' => $this->faker->randomElement(DokumenPermohonan::NAMA_DOKUMEN_ENUM),
            'diupload_oleh' => $this->faker->name,
            'peran' => $this->faker->randomElement(['Kuasa Hukum', 'Penggugat', 'Tergugat']),
            'file_path' => 'public/advokats/file_dokumen_kta/' . $this->faker->uuid . '.pdf',
            'status' => $this->faker->randomElement(DokumenPermohonan::STATUS_ENUM),
            'keterangan' => $this->faker->sentence,
        ];
    }
}
<?php

namespace Database\Factories;

use App\Models\PendaftaranPerkara;
use App\Models\Mahasiswa;
use App\Models\Kelas;
use App\Models\PendaftaranSidang;
use Illuminate\Database\Eloquent\Factories\Factory;

class PendaftaranPerkaraFactory extends Factory
{
    protected $model = PendaftaranPerkara::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_lengkap' => $this->faker->name,
            'alamat_kantor' => $this->faker->address,
            'no_handphone' => $this->faker->phoneNumber,
            'telp_kantor' => $this->faker->phoneNumber,
            'no_induk' => $this->faker->unique()->numerify('IND-#####'),
            'organisasi' => $this->faker->company,
            'tanggal_mulai_berlaku' => $this->faker->date,
            'tanggal_habis_berlaku' => $this->faker->dateTimeBetween('+1 month', '+1 year')->format('Y-m-d'),
            'tanggal_penyumpahan' => $this->faker->date,
            'tempat_penyumpahan' => $this->faker->city,
            'no_ba_sumpah' => $this->faker->numerify('BA-#####'),
            'no_ktp' => $this->faker->unique()->numerify('###########'),
            'bank' => $this->faker->company,
            'no_rekening' => $this->faker->bankAccountNumber,
            'nama_akun_bank' => $this->faker->name,
            'kelas_id' => Kelas::factory(),
            'mahasiswa_id' => Mahasiswa::factory(),
            'pendaftaran_sidang_id' => PendaftaranSidang::factory(),
            'file_dokumen_kta' => 'public/advokats/file_dokumen_kta/' . $this->faker->uuid . '.pdf',
            'file_dokumen_penyumpahan' => 'public/advokats/file_dokumen_penyumpahan/' . $this->faker->uuid . '.pdf',
            'file_dokumen_ktp' => 'public/advokats/file_dokumen_ktp/' . $this->faker->uuid . '.pdf',
        ];
    }
}
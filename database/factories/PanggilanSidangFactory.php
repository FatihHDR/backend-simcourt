<?php

namespace Database\Factories;

use App\Models\DetailPendaftaran;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PanggilanSidang;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PanggilanSidang>
 */
class PanggilanSidangFactory extends Factory
{
    protected $model = PanggilanSidang::class;

    public function definition()
    {
        return [
            'nomor' => $this->faker->regexify('[0-9]{3}/Pdt.P/[0-9]{4}/PN Mlg'),
            'tanggal_sidang' => $this->faker->date(),
            'jam_sidang' => $this->faker->time(),
            'detail_pendaftaran_id' => DetailPendaftaran::factory(),
            'catatan_panggilan' => 'Sidang pertama, saat persidangan harap membawa bukti-bukti surat asli dan menghadirkan 2 (dua) orang saksi yang salah satu saksi dari pihak keluarga.',
        ];
    }
}
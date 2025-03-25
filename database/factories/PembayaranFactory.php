<?php
namespace Database\Factories;

use App\Models\Pembayaran;
use App\Models\DetailPendaftaran;
use Illuminate\Database\Eloquent\Factories\Factory;

class PembayaranFactory extends Factory
{
    protected $model = Pembayaran::class;

    public function definition()
    {
        $isPemasukan = $this->faker->boolean;

        return [
            'detail_pendaftaran_id' => DetailPendaftaran::inRandomOrder()->first()->id,
            'tanggal_perkara' => $this->faker->date,
            'uraian' => $this->faker->sentence,
            'pemasukan' => $isPemasukan ? $this->faker->numberBetween(1000, 100000) : 0,
            'pengeluaran' => $isPemasukan ? 0 : $this->faker->numberBetween(1000, 100000),
            'sisa' => $this->faker->numberBetween(0, 50000),
        ];
    }
}
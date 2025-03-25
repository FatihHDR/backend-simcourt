<?php

namespace Database\Factories;

use App\Models\DetailPembayaran;
use App\Models\DetailPendaftaran;
use Illuminate\Database\Eloquent\Factories\Factory;

class DetailPembayaranFactory extends Factory
{
    protected $model = DetailPembayaran::class;

    public function definition(): array
    {
        return [
            'detail_pendaftaran_id' => DetailPendaftaran::factory(),
            'diterima_dari' => $this->faker->name,
            'panjar_perkara' => $this->faker->numberBetween(100000, 1000000),
            'status_pembayaran' => 'sudah dibayar',
            'tanggal_pembayaran' => $this->faker->date(),
            'jam_pembayaran' => $this->faker->time(),
        ];
    }
}
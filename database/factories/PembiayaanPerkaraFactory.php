<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\PembiayaanPerkara;

class PembiayaanPerkaraFactory extends Factory
{
    protected $model = PembiayaanPerkara::class;

    public function definition(): array
    {
        return [
            'jenis_pembiayaan' => $this->faker->randomElement(['Prodeo', 'Berbayar']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
<?php

namespace Database\Factories;

use App\Models\Pihak;
use App\Models\PersetujuanPihak;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersetujuanPihakFactory extends Factory
{
    protected $model = PersetujuanPihak::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'pihak_id' => Pihak::factory(), // Menggunakan factory Pihak untuk membuat data terkait
            'persetujuan' => $this->faker->randomElement(['setuju', 'tidak_setuju', 'belum_membuat']),
        ];
    }
}
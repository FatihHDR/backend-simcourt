<?php

namespace Database\Factories;

use App\Models\Dokumen;
use Illuminate\Database\Eloquent\Factories\Factory;

class DokumenFactory extends Factory
{
    protected $model = Dokumen::class;

    public function definition()
    {
        return [
            'judul' => $this->faker->sentence,
            'tanggal_pengiriman' => $this->faker->date,
            'jam_pengiriman' => $this->faker->time,
            'dikirim_oleh' => $this->faker->name,
        ];
    }
}
<?php

namespace Database\Factories;

use App\Models\Pihak;
use Illuminate\Database\Eloquent\Factories\Factory;

class PihakFactory extends Factory
{
    protected $model = Pihak::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'no_pendaftaran' => $this->faker->unique()->numerify('REG-#####'),
            'status_pihak' => $this->faker->randomElement(['aktif', 'nonaktif']),
            'email' => $this->faker->unique()->safeEmail,
            'nama_lengkap' => $this->faker->name,
            'status_alamat' => $this->faker->randomElement(['domisili', 'kantor']),
            'alamat' => $this->faker->address,
            'telepon' => $this->faker->phoneNumber,
            'provinsi' => $this->faker->state,
            'kecamatan' => $this->faker->citySuffix,
            'kabupaten' => $this->faker->city,
            'kelurahan' => $this->faker->streetName,
            'pendaftaran_sidang_id' => \App\Models\PendaftaranSidang::factory(), // Relasi ke PendaftaranSidang
        ];
    }
}
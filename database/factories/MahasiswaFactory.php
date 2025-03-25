<?php

namespace Database\Factories;

use App\Models\Mahasiswa;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;


class MahasiswaFactory extends Factory
{
    protected $model = Mahasiswa::class;

    public function definition()
    {
        return [
            'nim' => $this->faker->unique()->numerify('2023###########'),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // Password yang di-hash
            'role' => $this->faker->randomElement(['penggugat', 'tergugat', 'saksi', 'penasihat_hukum']),
            'kelas_id' => Kelas::factory()
        ];
    }
}

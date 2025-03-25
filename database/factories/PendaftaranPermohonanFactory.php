<?php

namespace Database\Factories;

use App\Models\PendaftaranPermohonan;
use App\Models\Group;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;

class PendaftaranPermohonanFactory extends Factory
{
    protected $model = PendaftaranPermohonan::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'persidangan_id' => $this->faker->randomNumber(3),
            'group_id' => Group::factory(),
            'class_id' => Kelas::factory(),
        ];
    }
}
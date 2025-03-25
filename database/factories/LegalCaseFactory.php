<?php

namespace Database\Factories;

use App\Models\LegalCase;
use App\Models\Mahasiswa; // Import the Mahasiswa model
use Illuminate\Database\Eloquent\Factories\Factory;

class LegalCaseFactory extends Factory
{
    protected $model = LegalCase::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'status' => $this->faker->randomElement(['open', 'closed']),
            'payment_status' => $this->faker->randomElement(['paid', 'unpaid']),
            'lawyer_id' => Mahasiswa::factory(),
        ];
    }
}
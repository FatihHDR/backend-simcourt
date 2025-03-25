<?php

namespace Database\Factories;

use App\Models\Kelas;
use App\Models\Instruktur;
use Illuminate\Database\Eloquent\Factories\Factory;

class KelasFactory extends Factory
{
    protected $model = Kelas::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word . ' Class',
            'instructor_id' => Instruktur::factory(),
            'schedule' => $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d H:i:s'),
            'code' => strtoupper($this->faker->lexify('CLASS ???')), 
        ];
    }
}
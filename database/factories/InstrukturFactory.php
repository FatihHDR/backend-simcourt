<?php

namespace Database\Factories;

use App\Models\Instruktur;
use Illuminate\Database\Eloquent\Factories\Factory;

class InstrukturFactory extends Factory
{
    protected $model = Instruktur::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'nip' => $this->faker->unique()->numerify('###########'),
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // Default password
        ];
    }
}

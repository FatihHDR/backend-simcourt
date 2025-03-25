<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\Kelas;
use Illuminate\Database\Eloquent\Factories\Factory;

class GroupFactory extends Factory
{
    protected $model = Group::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word . ' Group',
            'class_id' => Kelas::factory(),
        ];
    }
}

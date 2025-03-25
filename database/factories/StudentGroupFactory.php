<?php

namespace Database\Factories;

use App\Models\StudentGroup;
use App\Models\Group;
use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentGroupFactory extends Factory
{
    protected $model = StudentGroup::class;

    public function definition()
    {
        return [
            'group_id' => Group::factory(), // Create a new Group instance
            'mahasiswa_id' => Mahasiswa::factory(), // Create a new Mahasiswa instance
        ];
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentGroup;


class StudentGroupSeeder extends Seeder
{
    public function run()
    {
        StudentGroup::factory()->count(15)->create();
    }
}
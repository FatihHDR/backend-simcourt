<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create(attributes: [
            'name' => 'Admin',
            'email' => 'admin2@admin.com',
            'password' => Hash::make('password')
        ]);
    }
}
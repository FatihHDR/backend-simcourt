<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Instruktur;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Super Admin User
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'),
            'is_admin' => true,
        ]);

        // Create Admin Instruktur
        Instruktur::create([
            'name' => 'Admin Instruktur',
            'nip' => '1234567890',
            'email' => 'admin.instruktur@example.com',
            'password' => bcrypt('password123'),
            'role' => 'instruktur',
            'is_admin' => true,
        ]);
    }
}
<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name'     => 'Admin',
            'email'    => 'admin@psu.edu',
            'password' => 'password',
            'role'     => 'admin',
        ]);

        User::factory()->create([
            'name'     => 'Prof. Juan Dela Cruz',
            'email'    => 'employee@psu.edu',
            'password' => 'password',
            'role'     => 'employee',
        ]);
    }
}

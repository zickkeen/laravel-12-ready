<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@aka.my.id',
            'password' => bcrypt('admin123'),
            'role' => 'admin',
            'avatar_url' => '/storage/avatars/default.png',
            'active' => true,
        ]);
    }
}

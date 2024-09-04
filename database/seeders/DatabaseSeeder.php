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
            'email' => 'admin@gmail.com',
            'phone' => '01309338219',
            'password' => '01309338219',
            'role' => 'admin'
        ]);

        User::factory()->create([
            'phone' => '01782763384',
            'password' => '01782763384',
            'role' => 'customer'
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Spec;
use App\Models\SpecRow;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $roles = [
            ['id' => 1, 'role' => 'admin'],
            ['id' => 2, 'role' => 'viewer'],
            // Add more roles as needed
        ];

        // Insert the roles into the database
        foreach ($roles as $role) {
            DB::table('roles')->insert($role);
        }

        // Spec::factory()->count(10)->create();
        Spec::factory()
            ->count(5)
            ->create();
    }
}

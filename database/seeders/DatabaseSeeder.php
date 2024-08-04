<?php

namespace Database\Seeders;

use App\Models\Society;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::transaction(function () {
            User::factory()->create([
                'email' => 'coordinator@example.com',
                'password' => '1',
                'role' => 'society coordinator',
            ]);

            // Create one president
            $president = User::factory()->create([
                'email' => 'president@example.com',
                'password' => '1',
                'role' => 'society president',
            ]);

            // Create one student
            User::factory()->create([
                'email' => 'student@example.com',
                'password' => '1',
                'role' => 'student',
            ]);

            // Create one student
            User::factory()->unverified()->create([
                'email' => 'student2@example.com',
                'password' => '1',
                'role' => 'student',
            ]);

            Society::factory()->create([
                'name' => 'Basketball Society',
                'is_active'  => true,
                'president_id' => $president->id,
            ]);
        });
    }
}

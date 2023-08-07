<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Task;
use Database\Factories\UserFactory;
use Database\Factories\TaskFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(AdminUserSeeder::class);
        User::factory()->count(10)->create();
        Task::factory()->count(10)->create();
    }
}

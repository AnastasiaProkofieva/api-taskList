<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::query()->create([
            "name" => "Task1",
            "description" => "description1",
            "status" => 2,
            "user_id" => 2,
        ]);
        Task::query()->create([
            "name" => "Task2",
            "description" => "description2",
            "status" => 2,
            "user_id" => 3,
        ]);
    }
}

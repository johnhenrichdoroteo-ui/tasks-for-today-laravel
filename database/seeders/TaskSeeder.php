<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schedule = [
            [-2, 'Review project requirements', 'completed'],
            [-2, 'Prepare meeting notes', 'completed'],
            [-1, 'Update task estimates', 'completed'],
            [0, 'Check pending messages', 'pending'],
            [0, 'Finish the website wireframe', 'in_progress'],
            [0, 'Test the task dashboard', 'pending'],
            [0, 'Share a progress update', 'pending'],
            [1, "Draft next week's plan", 'pending'],
            [1, 'Organize team files', 'pending'],
        ];

        foreach ($schedule as [$offset, $title, $status]) {
            Task::firstOrCreate(
                ['title' => $title, 'task_date' => today()->addDays($offset)->toDateString()],
                ['status' => $status],
            );
        }
    }
}

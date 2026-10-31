<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function today(): View
    {
        $today = today();

        return view('pages.today', [
            'today' => $today,
            'tasks' => Task::query()->whereDate('task_date', $today)->orderBy('id')->get(),
        ]);
    }

    public function index(): View
    {
        return view('pages.tasks', [
            'tasks' => Task::query()->orderBy('task_date')->orderBy('id')->get(),
        ]);
    }
}

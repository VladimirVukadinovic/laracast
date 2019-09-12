<?php

namespace App\Http\Controllers;

use App\Project;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectTasksController extends Controller
{
    public function update(Task $task)
    {
        $task->update([
           'completed' => request()->has('completed')
        ]);

        return back();
    }

    public function store(Project $project)
    {

        $validated = request()->validate(['description' => ['required', 'min:5']]);

        $project->addTask($validated);

        return back();
    }
}

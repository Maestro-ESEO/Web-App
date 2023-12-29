<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function show()
    {
        return view('task', [
            'tasks' => Task::all()
        ]);
    }

    public function post(Request $request) : string
    {
        $request->validate([
            'name' => 'string|required',
            'description' => 'string|nullable',
            'deadline' => 'date|nullable',
            'priority' => 'int|required',
            'project_id' => 'int|required'
        ]);

        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description ?? null;
        $task->deadline = $request->deadline ?? null;
        // Le statut d'une tâche nouvellement créé est forcément "À faire"
        $task->status = 0;
        $task->priority = $request->priority;
        $task->project_id = $request->project_id;
        $task->save();

        return $task->toJson();
    }
}

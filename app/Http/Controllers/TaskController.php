<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Auth;
use App\Models\Project;
use App\Models\User;


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
        // The status of a new task is "To Do"
        $task->status = 0;
        $task->priority = $request->priority;
        $task->project_id = $request->project_id;
        // User admin of the project ?
        $is_admin = ProjectController::is_admin(Project::find($request->project_id), Auth::user());
        if($is_admin != true){
            abort(404, "The user is not an administrator");
        }
        $task->save();
        return $task->toJson();
    
    }
}

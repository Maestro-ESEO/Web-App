<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;
use App\Utils\AuthUtil;

class TaskController extends Controller
{
    public function print()
    {
        return view('task', [
            'tasks' => Task::all()
        ]);
    }

    public function store(Request $request) : JsonResponse
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
        $is_admin = ProjectController::is_admin(Project::find($request->project_id), AuthUtil::getAuthUser());
        if($is_admin != true){
            return response()->json([
                'status' => 404,
                'message' => 'Not authorized',
            ]);
        }
        $task->save();
        return response()->json([
            'status' => 200,
            'message' => 'Task created successfully',
            'data' => $task,
        ]);
    }

    public function index() : array
    {
        $tasks =  Task::all()->index();
        return response()->json([
            'status' => 200,
            'message' => 'Tasks found successfully',
            'data' => $tasks,
        ]);
    }

    public function show(Request $request) : string
    {
        $request->validate([
            'id' => 'required',
        ]);

        $task = Task::findorfail($request->id);
        return response()->json([
            'status' => 200,
            'message' => 'Task found successfully',
            'data' => $task,
        ]);
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required',
        ]);
        $task = Task::findorfail($request->id);
        $task->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Task deleted successfully',
        ]);
    }

    public function update(Request $request, $id) : string
    {
        $request->validate([
            'name' => 'string|nullable',
            'description' => 'string|nullable',
            'deadline' => 'date|nullable',
            'priority' => 'int|nullable',
            'project_id' => 'int|nullable'
        ]);

        $task = Task::findOrFail($id);
        $task->name = $request->name ?? $task->name;
        $task->description = $request->description ?? $task->description;
        $task->deadline = $request->deadline ?? $task->deadline;
        $task->priority = $request->priority ?? $task->priority;
        $task->project_id = $request->project_id ?? $task->project_id;
        $task->save();

        return response()->json([
            'status' => 200,
            'message' => 'Task updated successfully',
            'data' => $task
        ]);
    }
}


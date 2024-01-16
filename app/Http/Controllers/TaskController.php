<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;
use App\Utils\AuthUtil;
use App\Models\UserProject;

class TaskController extends Controller
{

    public function store(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'name' => 'string|required',
            'description' => 'string|nullable',
            'deadline' => 'date|nullable',
            'priority' => 'int|required',
            'project_id' => 'int|required'
        ]);

        $task = new Task();
        $task->name = $credentials['name'];
        $task->description = $request->description ?? null;
        $task->deadline = $request->deadline ?? null;
        // The status of a new task is "To Do"
        $task->status = 0;
        $task->priority = $request->priority;
        $task->project_id = $request->project_id;
        // User admin of the project ?
        $is_admin = app(ProjectController::class)->isAdmin(Project::find($request->project_id)->id, AuthUtil::getAuthUser()->id);
        if ($is_admin != true) {
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

    public function index(): JsonResponse
    {
        $tasks =  Task::all();
        return response()->json([
            'status' => 200,
            'message' => 'Tasks found successfully',
            'data' => $tasks,
        ]);
    }

    public function show($id)
    {
        $user = AuthUtil::getAuthUser();
        $task = Task::all()->find($id);
        $project = Project::all()->find($task->project_id);

        if (!$task or !$project or !UserProject::where("project_id", $project->id)->where("user_id", $user->id)->get()->count()) {
            return redirect()->back();
        }

        $is_admin = app(ProjectController::class)->isAdmin($project->id, $user->id);

        return view("app.task", [
            "project" => $project,
            "is_admin" => $is_admin,
            "task" => $task,
            "user" => $user
        ]);
    }

    public function getComments($id){
        $comments = Comment::where("task_id", $id)->orderByDesc("created_at")->get();

        return $comments;
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

    public function update(Request $request, $id): string
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

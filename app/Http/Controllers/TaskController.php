<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Project;
use App\Utils\AuthUtil;
use App\Models\UserProject;

class TaskController extends Controller {

    public function show($id) {
        $user = AuthUtil::getAuthUser();
        $task = Task::find($id);
        if(!$task) {
            return redirect()->back();
        }
        $project = Project::all()->find($task->project_id);

        if (!$project or !UserProject::where("project_id", $project->id)->where("user_id", $user->id)->get()->count()) {
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
        return Comment::where("task_id", $id)->orderByDesc("created_at")->get();
    }

    public function updateStatus($id, $status) {
        $task = Task::find($id);
        $user = AuthUtil::getAuthUser();

        if(!$task){
            return redirect(route('dashboard'));
        }
        elseif(UserProject::where("project_id", $task->project->id)->where("user_id", $user->id)->get()->count()){
            $task->status = $status;
            $task->save();
        }
        return redirect()->back();
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

<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\UserProject;
use App\Models\User;
use App\Utils\AuthUtil;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{
    public function show($id) {
        $user = AuthUtil::getAuthUser();
        $project = Project::all()->find($id);

        if (!$project or !UserProject::where("project_id", $project->id)->where("user_id", $user->id)->get()->count()) {
            return redirect()->route("dashboard");
        }

        $is_admin = ProjectController::isAdmin($project, $user);

        return view("app.project", [
            "project" => $project,
            "is_admin" => $is_admin
        ]);
    }

    public function index(): JsonResponse {
        $projects = Project::all();
        $user = AuthUtil::getAuthUser();
        $projects = $projects->filter(function ($value, $key) use ($user) {
            return UserProject::where("project_id", $value->id)->where("user_id", $user->id)->get()->count();
        });

        return response()->json([
            "status" => "200",
            "message" => "Projects found successfully",
            "data" => $projects,
        ]);
    }

    public static function isAdmin(Project $project, User $user): bool {
        $taskProject = UserProject::where("project_id", $project->id)
            ->where("user_id", $user->id)
            ->where("is_admin", true)
            ->get();

        return (bool) count($taskProject);
    }

    public function getProgression(String $id): array
    {
        $tasks = Task::where("project_id", $id)->get();

        $tasks_completed = $tasks->filter(function ($value, $key) {
            return $value->status == 3;
        })->count();
        $tasks_unfinished = $tasks->count() - $tasks_completed;

        $percent = $tasks->count() == 0 ? -1 : floor($tasks_completed / $tasks->count() * 100);

        return [
            "tasks_completed" => $tasks_completed,
            "tasks_unfinished" => $tasks_unfinished,
            "percent" => $percent,
        ];
    }

    public function getTasks(String $id): array {
        $tasks = Task::where("project_id", $id)->orderByDesc("priority")->get();

        return [
            "to_do" => $tasks->filter(function ($value, $key) {
                return $value->status == 0;
            }),
            "in_progress" => $tasks->filter(function ($value, $key) {
                return $value->status == 1;
            }),
            "in_revision" => $tasks->filter(function ($value, $key) {
                return $value->status == 2;
            }),
            "done" => $tasks->filter(function ($value, $key) {
                return $value->status == 3;
            })
        ];
    }
}

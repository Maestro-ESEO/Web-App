<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use App\Models\UserProject;
use App\Utils\AuthUtil;

class ProjectController extends Controller {
    
    public function show($id) {
        $user = AuthUtil::getAuthUser();
        $project = Project::all()->find($id);

        if (!$project or !UserProject::where("project_id", $project->id)->where("user_id", $user->id)->get()->count()) {
            return redirect()->back();
        }

        $is_admin = app(ProjectController::class)->isAdmin($project->id, $user->id);

        return view("app.project", [
            "project" => $project,
            "is_admin" => $is_admin
        ]);
    }

    public function index(): array {
        $projects = Project::all();
        $user = AuthUtil::getAuthUser();
        $projects = $projects->filter(function ($value, $key) use ($user) {
            return UserProject::where("project_id", $value->id)->where("user_id", $user->id)->get()->count();
        });

        return $projects->toArray();
    }

    public function isAdmin(int $projectId, int $userId): bool {
        $taskProject = UserProject::where("is_admin", true)
            ->where("project_id", $projectId)
            ->where("user_id", $userId)
            ->get();

        return (bool) count($taskProject);
    }

    public function getProgression(String $id): array {
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

    public function getUsers($id) {
        $usersProjects = UserProject::where('project_id', $id)->get();
        $userIds = $usersProjects->pluck('user_id')->toArray();
        $users = User::whereIn('id', $userIds)->get();
        return $users;
    }

    public function getAssignedProjectsCount() {
        $user = AuthUtil::getAuthUser();
        $projects = Project::all();
        $projects = $projects->filter(function ($value, $key) use ($user) {
            return UserProject::where("project_id", $value->id)->where("user_id", $user->id)->get()->count();
        });
        return $projects->count();
    }

}
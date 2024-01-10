<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserProject;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{

    public function index(): JsonResponse
    {
        // Get all projects and respond with JSON (status, message and data)
        $projects = Project::all();
        return response()->json([
            'status' => '200',
            'message' => 'Projects found successfully',
            'data' => $projects,
        ]);
    }
    
    public function store(Request $request): string
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'date|nullable',
            'end_date' => 'date|nullable'
        ]);
        
        $project = new Project();
        $project->title = $request->title;
        $project->description = $request->description;
        $project->start_date = $request->start_date ?? null;
        $project->end_date = $request->end_date;
        $project->save();
        
        return $project->toJson();
    }

    public function get(Request $request): Project
    {
        $request->validate([
            'id' => 'required'
        ]);

        return Project::all()->find($request->id);
    }

    public function patch(Request $request): Project
    {
        $request->validate([
            'title' => 'nullable',
            'description' => 'nullable',
            'start_date' => 'date|nullable',
            'end_date' => 'date|nullable'
        ]);

        $project = Project::findOrFail($request->id);
        $project->title = $request->title;
        $project->description = $request->description;
        $project->start_date = $request->start_date ?? null;
        $project->end_date = $request->end_date;
        $project->save();

        return $project;
    }

    public static function is_admin(Project $project, User $user): bool
    {
        $taskProject = UserProject::where('project_id', $project->id)
            ->where('user_id', $user->id)
            ->where('is_admin', true)
            ->get();

        return (bool) count($taskProject);

    }

}

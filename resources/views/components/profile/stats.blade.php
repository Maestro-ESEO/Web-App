@php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

$nbAssignedProjects = app(ProjectController::class)->getAssignedProjectsCount();
$nbAssignedTasks = app(TaskController::class)->getAssignedTasksCount();

@endphp

<div class="flex flex-1 flex-col items-center justify-start gap-3 rounded-2xl shadow-project p-4 min-w-96 bg-gray-100">
    <h3 class="font-bold text-black text-xl">Your statistics</h3>

    <div class="">
        <div>
            <x-icons.project />
            <h3>{{ $nbAssignedProjects }}</h3>
        </div>

        <div>
            <x-icons.task />
            <h3>{{ $nbAssignedTasks }}</h3>
        </div>
    </div>
</div>
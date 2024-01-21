@php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

$nbAssignedProjects = app(ProjectController::class)->getAssignedProjectsCount();
$nbAssignedTasks = app(TaskController::class)->getAssignedTasksCount();

@endphp

<div class="flex flex-1 flex-col items-center justify-start gap-3 rounded-2xl shadow-project p-4 min-w-96 bg-gray-100">
    <h3 class="font-bold text-black text-xl">Your statistics</h3>

    <div class="w-full flex-1 flex flex-row items-center justify-evenly">
        <div class="flex flex-col items-center justify-start gap-2">
            <x-icons.project size=64 />
            <p class="flex flex-row items-center justify-center gap-2">
                <span class="text-4xl font-bold">{{ $nbAssignedProjects }}</span>
                assigned projects
            </p>
        </div>

        <div class="flex flex-col items-center justify-start gap-2">
            <x-icons.task size=64 />
            <p class="flex flex-row items-center justify-center gap-2">
                <span class="text-4xl font-bold">{{ $nbAssignedTasks }}</span>
                assigned tasks
            </p>
        </div>
    </div>
</div>
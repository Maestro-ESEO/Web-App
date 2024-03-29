@extends("app.layout")


@section("content")

@php
use App\Http\Controllers\ProjectController;
$deadline = strtotime($project->end_date);
$creation = strtotime($project->created_at);

$tasks = app(ProjectController::class)->getTasks($project->id);
$users = app(ProjectController::class)->getUsers($project->id);

@endphp

<div class="w-full h-full flex flex-col justify-start py-14 px-16 gap-4">
    <div class="w-full flex justify-between items-center">
        <div class="flex flex-col justify-start items-start gap-2">
            <div class="flex justify-start items-center gap-2">
                <x-icons.project size="36" />
                <x-ui.title>{{$project->name}}</x-ui.title>
            </div>
            <p class="text-sm text-dark-gray">{{$project->description}}</p>
            <div class="flex justify-start items-center gap-3">
                <x-ui.people :users="$users" nbDisplayed=10 />
                <x-ui.boxIcon type="creation" content="{{date('M. d, Y',$creation)}}" />
                <x-ui.boxIcon type="deadline" content="{{date('M. d, Y',$deadline)}}" />
            </div>
        </div>
    </div>
    <div class="w-full flex justify-start items-start bg-gray-100 rounded-2xl py-5 px-4 mt-3">
        <x-kanban.column color="cyan-600" :tasks="$tasks['to_do']">To do </x-kanban.column>
        <x-kanban.column color="orange-600" :tasks="$tasks['in_progress']">In progress</x-kanban.column>
        <x-kanban.column color="purple-600" :tasks="$tasks['in_revision']">In revision</x-kanban.column>
        <x-kanban.column color="green-600" :tasks="$tasks['done']">Completed</x-kanban.column>
    </div>
</div>

@endsection
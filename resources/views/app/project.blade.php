@extends("app.layout")


@section("content")

@php
use App\Http\Controllers\ProjectController;
$deadline = strtotime($project->end_date);
$creation = strtotime($project->created_at);

$tasks = app(ProjectController::class)->getTasks($project->id);

@endphp

<div class="w-full h-full flex flex-col justify-start py-14 px-16 gap-4">
    <div class="w-full flex justify-between items-center">
        <div class="flex flex-col justify-start items-start gap-2">
            <x-ui.title>{{$project->name}}</x-ui.title>
            <p class="text-sm text-dark-gray">{{$project->description}}</p>
            <div class="flex justify-start items-center gap-3">
                <x-project-card.people id="{{$project->id}}" nbDisplayed=10 />
                <x-project-card.date type="creation" date="{{date('M. d, Y',$creation)}}" />
                <x-project-card.date type="deadline" date="{{date('M. d, Y',$deadline)}}" />
            </div>
        </div>
        <div class="flex justify-center items-center">
            <button class="rounded-xl px-3 py-2 bg-red text-sm text-white font-bold shadow-btn flex flex-nowrap gap-2 justify-center items-center">
                <x-icons.edit size=16 />Edit Project</button>
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
@extends("app.layout")


@section("content")

@php

use App\Http\Controllers\TaskController;
$deadline = strtotime($task->deadline);
$comments = app(TaskController::class)->getComments($task->id);

@endphp


<div class="w-full h-full flex flex-col justify-start py-14 px-16 gap-4">
    <div class="w-full flex justify-start items-center">
        <div class="flex flex-col justify-start items-start gap-2">
            <div class="flex justify-start items-center gap-2">
                <x-icons.task size="36" />
                <x-ui.title>{{$task->name}}</x-ui.title>
            </div>
            <p class="text-sm text-dark-gray">{{$task->description}}</p>
            <div class="flex justify-start items-center gap-3">
                <x-project-card.date type="deadline" date="{{$project->name}}" />
                <x-project-card.date type="deadline" date="{{date('M. d, Y',$deadline)}}" />
            </div>
        </div>
    </div>

    <div class="flex justify-start items-center gap-2">
        <x-task.button :task="$task" color="cyan-600" status=0>To Do</x-task.button>
        <x-task.button :task="$task" color="orange-600" status=1>In progress</x-task.button>
        <x-task.button :task="$task" color="purple-600" status=2>In revision</x-task.button>
        <x-task.button :task="$task" color="green-600" status=3 stylecss="pointer-events-none">
            <div class="flex justify-center items-center gap-2">
                <x-icons.lock size=16/>
                <p>Completed</p>
            </div>
        </x-task.button>
    </div>
    <div class="flex flex-col gap-2 justify-start items-start mt-10">
        <p class="font-semibold">Commentaires :</p>
        <div class="w-full flex flex-col justify-center items-start gap-4 overflow-hidden">
            @foreach ($comments as $comment)
            <x-task.commentary :comment="$comment"></x-task.commentary>
            @endforeach
        </div>
    </div>

</div>

@endsection
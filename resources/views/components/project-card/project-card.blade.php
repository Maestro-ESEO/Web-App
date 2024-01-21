@props([
    'name' => null,
    'id' => null,
    'description'=> "This project does not have a description",
    'deadline'=> null,
    'href' => 'dashboard'
])


@php

use App\Http\Controllers\ProjectController;

$date = strtotime($deadline);
$progression = app(ProjectController::class)->getProgression($id);
$users = app(ProjectController::class)->getUsers($id);

@endphp


@if ($name != null and $deadline != null and $id != null)
    <a href="{{ $href }}" class="w-[24rem] h-56 flex flex-col justify-start items-start bg-gray-100 rounded-2xl shadow-project p-4 gap-3 hover:shadow-red transition-all cursor-pointer">
        <p class="font-bold text-black text-xl">{{$name}}</p>
        <p class="text-dark-gray text-sm min-h-10 line-clamp-2">{{$description}}</p>

        <x-ui.boxIcon content="{{date('M. d, Y', $date)}}" type="deadline" />
        <x-ui.divider />

        <div class="w-full flex justify-start items-center gap-3">
            <x-ui.people
                :users="$users"
                nbDisplayed=4
            />

            <x-project-card.task-info
                percent="{{ $progression['percent'] }}"
                tasksUnfinished="{{ $progression['tasks_unfinished'] }}"
            />
        </div>
    </a>
@endif